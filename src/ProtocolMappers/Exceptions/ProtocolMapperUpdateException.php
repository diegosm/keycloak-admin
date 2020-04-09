<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers\Exceptions;

class ProtocolMapperUpdateException extends \Exception
{
    protected $message = 'Error when trying to update protocol mapper.';
}
