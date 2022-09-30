<?php

namespace App\Services\Link;

use App\Services\Link\Interfaces\LinkStorageInterface;
use App\Services\Link\Interfaces\LinkResponseInterface;
use App\Services\Link\Responses\LinkGetResponse;
use App\Services\Link\Responses\LinkResponse;

class LinkStorage implements LinkStorageInterface
{
    public function __construct(private readonly MysqlStorage $mysqlStorage) {}

    public function save(Structures\Link $linkStructure): LinkResponseInterface
    {
        $token = TmpStorage::get($linkStructure->getHash());
        if ($token !== null) {
            return new LinkResponse($token);
        }

        $link = $this->mysqlStorage->save($linkStructure);
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
}
