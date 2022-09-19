<?php

namespace App\Services\Link\Structures;

class Link
{
    /**
     * @var string
     */
    private string $hash;

    public function __construct(private readonly string $token,
                                private readonly string $link,
                                private readonly ?string $ip = null)
    {
        $this->hash = md5($this->link);
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }
}
