<?php
namespace Product\Request;

class Session
{
    static function start(): Session
    {
        session_start();

        return new static;
    }

    private $session;

    protected function __construct()
    {
        $this->session = &$_SESSION;
    }

    function __destruct()
    {
        session_write_close();
    }

    function get(string $key, $default = null)
    {
        return $this->session[$key] ?? $default;
    }

    function set(string $key, $value): Session
    {
        $this->session[$key] = $value;

        return $this;
    }

    function remove(string $key)
    {
        unset($this->session[$key]);
    }
}
