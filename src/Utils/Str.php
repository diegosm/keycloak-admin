<?php

declare(strict_types=1);

namespace KeycloakAdmin\Utils;

class Str
{
    public static function endsWith(string $string, string $end) : bool
    {
        return substr($string, strlen($string) - strlen($end), strlen($end)) === $end;
    }
}