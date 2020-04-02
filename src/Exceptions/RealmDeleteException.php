<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exceptions;

class RealmDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete realm.';
}
