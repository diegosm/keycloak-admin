<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers\Exceptions;

class ProtocolMapperInvalidException extends \Exception
{
    protected $message = 'Protocol Mapper Invalid.';
}
