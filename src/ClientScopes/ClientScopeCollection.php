<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes;

use KeycloakAdmin\Utils\Collection;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation as Serializer;

class ClientScopeCollection extends Collection
{
    /**
     * @Type("array<KeycloakAdmin\ClientScopes\ClientScope>")
     * @Serializer\Inline()
     */
    protected $data;

    public function getData()
    {
        return $this->data;
    }
}
