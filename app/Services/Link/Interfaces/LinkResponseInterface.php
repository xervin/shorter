<?php

namespace App\Services\Link\Interfaces;

interface LinkResponseInterface
{
    public function success(): bool;

    public function link(): ?string;
}
