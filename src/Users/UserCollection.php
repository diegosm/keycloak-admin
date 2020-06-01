<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use KeycloakAdmin\Utils\Collection;

class UserCollection extends Collection
{
    /**
     * @Type("array<KeycloakAdmin\Users\User>")
     * @Serializer\Inline()
     */
    protected $data;

    /**
     * @return User[]
     */
    public function getUsers()
    {
        return $this->data;
    }
}
