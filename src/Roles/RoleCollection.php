<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class RoleCollection
{
    /**
     * @Type("array<KeycloakAdmin\Roles\Role>")
     * @Serializer\Inline()
     */
    private $roles;

    public function getRoles()
    {
        return $this->roles;
    }
}
