<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use KeycloakAdmin\Utils\Collection;

class RoleCollection extends Collection
{
    /**
     * @Type("array<KeycloakAdmin\Roles\Role>")
     * @Serializer\Inline()
     */
    protected $data;

    public function getRoles()
    {
        return $this->data;
    }
}
