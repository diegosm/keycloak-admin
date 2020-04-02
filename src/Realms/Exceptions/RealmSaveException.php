<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms\Exceptions;

class RealmSaveException extends \Exception
{
    protected $message = 'Error when trying to save realm.';
}
