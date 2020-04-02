<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exceptions;

class InvalidRealmException extends \Exception
{
    protected $message = 'Invalid realm exception';
}
