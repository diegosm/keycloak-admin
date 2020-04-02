<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use JMS\Serializer\Annotation\Type;

class ProtocolMapper
{
    /**
     * @Type("integer")
     */
    private $id;

    /**
     * @Type("string")
     */
    private $name;

    /**
     * @Type("string")
     */
    private $protocol;

    /**
     * @Type("string")
     */
    private $protocolMapper;

    /**
     * @Type("boolean")
     */
    private $consentRequired;

    /**
     * @Type("array")
     */
    private $config;
}
