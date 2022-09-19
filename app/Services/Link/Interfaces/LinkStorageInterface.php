<?php

namespace App\Services\Link\Interfaces;

use App\Services\Link\Structures\Link;

interface LinkStorageInterface
{
    public function save(Link $linkStructure): LinkResponseInterface;
    public function get(string $token): LinkResponseInterface;
}
