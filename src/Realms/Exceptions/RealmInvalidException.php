<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms\Exceptions;

class RealmInvalidException extends \Exception
{
    protected $message = 'Realm invalid exception.';
}
