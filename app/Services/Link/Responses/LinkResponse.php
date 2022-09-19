<?php

namespace App\Services\Link\Responses;

use App\Services\Link\Interfaces\LinkResponseInterface;

class LinkResponse implements LinkResponseInterface
{
    public function __construct(private readonly ?string $token = null) {}

    public function success(): bool
    {
        return $this->token !== null;
    }

    public function link(): ?string
    {
        return $this->token ? url()->to('/') . '/' . $this->token : null;
    }
}
