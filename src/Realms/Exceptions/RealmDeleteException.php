<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms\Exceptions;

class RealmDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete realm.';
}
