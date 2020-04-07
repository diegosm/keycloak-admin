<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use KeycloakAdmin\Utils\Collection;

class ClientCollection extends Collection
{
    /**
     * @Type("array<KeycloakAdmin\Clients\Client>")
     * @Serializer\Inline()
     */
    protected $data;

    public function getData()
    {
        return $this->data;
    }
}
