<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms\Exceptions;

class RealmNotFoundException extends \Exception
{
    protected $message = 'Realm not found.';
}
