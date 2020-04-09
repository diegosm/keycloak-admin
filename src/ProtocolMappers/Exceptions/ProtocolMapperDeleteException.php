<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers\Exceptions;

class ProtocolMapperDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete protocol mapper.';
}
