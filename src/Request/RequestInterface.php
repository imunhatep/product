<?php
namespace Product\Request;

interface RequestInterface
{
    function get(string $key, $default = null);

    function getCookie(string $key, $default = null);

    function setCookie(string $key, $value): Request;

    function getServer(string $key);
}
