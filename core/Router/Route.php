<?php

class Route
{
    private string $url;

    private string $action;

    public function __construct(string $url, string $action)
    {
        $this->url = $url;
        $this->action = $action;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
