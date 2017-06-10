<?php

class Request
{
    private $get;
    private $post;
    private $cookies;

    static function createFromGlobals()


    function __construct(array $get, array $post, array $cookies)
    {
        $this->get = $get;
        $this->post = $post;
        $this->cookies = $cookies;
    }

    function get(string $key, $default = null)
    {
        return $this->get[$key] ?? $this->post[$key] ?? $default;
    }
}
