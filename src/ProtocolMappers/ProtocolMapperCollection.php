<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers;

use KeycloakAdmin\Utils\Collection;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation as Serializer;

class ProtocolMapperCollection extends Collection
{
    /**
     * @Type("array<KeycloakAdmin\ProtocolMappers\ProtocolMapper>")
     * @Serializer\Inline()
     */
    protected $data;

    public function getData()
    {
        return $this->data;
    }
}
