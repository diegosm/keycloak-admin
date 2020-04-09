<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers\Exceptions;

class ProtocolMapperNotFoundException extends \Exception
{
    protected $message = 'Protocol Mapper not found.';
}
