<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exceptions;

class RealmSaveErrorException extends \Exception
{
    protected $message = 'Error when trying to save realm.';
}