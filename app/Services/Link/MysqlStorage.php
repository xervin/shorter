<?php

namespace App\Services\Link;

use App\Models\Link;
use Illuminate\Support\Facades\Log;

class MysqlStorage
{
    public function save(Structures\Link $linkStructure): ?Link
    {
        try {
            $link = Link::where('hash', $linkStructure->getHash())->first();
        } catch (\Exception $e) {
            Log::error('Search link by hash was failed: ' . $e->getMessage());
        }

        if (!isset($link)) {
            try {
                $link = new Link();
                $link->token = $linkStructure->getToken();
                $link->hash = $linkStructure->getHash();
                $link->link = $linkStructure->getLink();
                $link->ip = $linkStructure->getIp();
                $result = $link->save();

                if ($result) {
                    return $link;
                }

            } catch (\Exception $e) {
                Log::error('Save new link failed: ' . $e->getMessage());
            }
        }

        return $link ?? null;
    }

    public function get(string $token): ?Link
    {
        try {
            $link = Link::where('token', $token)->first();
        } catch (\Exception $e) {
            Log::error('Search link by token was failed: ' . $e->getMessage());
        }

        return $link ?? null;
    }
}
