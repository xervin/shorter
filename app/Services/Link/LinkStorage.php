<?php

namespace App\Services\Link;

use App\Events\LinkAdded;
use App\Models\Link;
use App\Models\User;
use App\Services\Link\Interfaces\LinkStorageInterface;
use App\Services\Link\Interfaces\LinkResponseInterface;
use App\Services\Link\Responses\LinkGetResponse;
use App\Services\Link\Responses\LinkResponse;
use Illuminate\Support\Facades\Auth;

class LinkStorage implements LinkStorageInterface
{
    public function __construct(private readonly MysqlStorage $mysqlStorage) {}

    public function save(Structures\Link $linkStructure): LinkResponseInterface
    {
        $token = TmpStorage::get($linkStructure->getHash());

        if ($token !== null) {
            if (Auth::check()) {
                $link = Link::where('token', $token)->first();
                if ($link === null) {
                    $link = $this->mysqlStorage->save($linkStructure);
                    $token = $link->token;
                }
                if ($link->users()->where('user_id', Auth::id())->first() === null) {
                    $this->attachLinkToUser($link);
                }
            }

            return new LinkResponse($token);
        }

        $link = $this->mysqlStorage->save($linkStructure);

        if (Auth::check() && $link instanceof Link) {
            $this->attachLinkToUser($link);
        }

        TmpStorage::save($link);

        return new LinkResponse($link->token ?? null);
    }

    public function get(string $token): LinkResponseInterface
    {
        $link = TmpStorage::get($token);
        if ($link !== null) {
            return new LinkGetResponse($link);
        }

        $result = $this->mysqlStorage->get($token);
        TmpStorage::save($result);

        return new LinkGetResponse($result->link ?? null);
    }

    public function attachLinkToUser(Link $link)
    {
        $user = User::find(Auth::user())->first();
        $user->links()->attach($link);
        $link->refresh();
    }
}
