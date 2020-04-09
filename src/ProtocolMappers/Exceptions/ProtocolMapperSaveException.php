<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers\Exceptions;

class ProtocolMapperSaveException extends \Exception
{
    protected $message = 'Error when trying to save protocol mapper.';
}
