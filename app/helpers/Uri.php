<?php
namespace app\helpers;

class Uri
{
    public static function get(string $key): string
    {
        return $_GET[$key] ?? '/';
    }
}
