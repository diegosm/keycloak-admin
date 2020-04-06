<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserCredentialRepresentationSaveException extends \Exception
{
    protected $message = 'Error when trying to save credential representation.';
}
