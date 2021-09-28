<?php

namespace app;

class Api
{
    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }


    public function getUrl(): string
    {
        return $this->url;
    }

    public function data(): object
    {
        $url = file_get_contents($this->url);
        return json_decode($url);
    }
}