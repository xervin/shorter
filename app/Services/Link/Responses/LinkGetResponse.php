<?php

namespace App\Services\Link\Responses;

use App\Services\Link\Interfaces\LinkResponseInterface;

class LinkGetResponse implements LinkResponseInterface
{
    public function __construct(private readonly ?string $link = null) {}

    public function success(): bool
    {
        return $this->link !== null;
    }

    public function link(): ?string
    {
        return $this->link;
    }
}
