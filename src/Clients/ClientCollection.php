<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class ClientCollection
{
    /**
     * @Type("array<KeycloakAdmin\Clients\Client>")
     * @Serializer\Inline()
     */
    private $clients;

    public function getClients()
    {
        return $this->clients;
    }
}