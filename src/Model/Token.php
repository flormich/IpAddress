<?php

namespace App\Model;

class Token
{
    private $ip;
    private $userAgent;
    private $key;

    
    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip)
    {
        $this->ip = $ip;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent)
    {
        $this->userAgent = $userAgent;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key)
    {
        $this->key = $key;
    }

    public function __toString()
    {
        return $this->key;  //permet de pouvoir mettre $token dans la vue au lieu de $token->getKey()
    }
}