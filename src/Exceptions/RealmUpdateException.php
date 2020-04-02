<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exceptions;

class RealmUpdateException extends \Exception
{
    protected $message = 'Error when trying to update realm.';
}