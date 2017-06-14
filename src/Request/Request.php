<?php
namespace Product\Request;

class Request implements RequestInterface
{
    private $get;
    private $post;
    private $cookies;
    private $server;
    private $session;

    static function createFromGlobals(): Request
    {
        return new static($_GET, $_POST, $_COOKIE, $_SERVER, Session::start());
    }

    function __construct(
        array $get,
        array $post,
        array $cookies,
        array $server,
        Session $session
    )
    {
        $this->get = $get;
        $this->post = $post;
        $this->cookies = $cookies;
        $this->server = $server;
        $this->session = $session;
    }

    function get(string $key, $default = null)
    {
        return $this->get[$key] ?? $this->post[$key] ?? $default;
    }

    function getCookie(string $key, $default = null)
    {
        return $this->cookies[$key] ?? $default;
    }

    function setCookie(string $key, $value): Request
    {
        $this->cookies[$key] = $value;

        return $this;
    }

    function getServer(string $key)
    {
        return $this->server[$key] ?: null;
    }

    function getSession(): Session
    {
        return $this->session;
    }
}
