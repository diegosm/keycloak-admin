<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class UserCollection
{
    /**
     * @Type("array<KeycloakAdmin\Users\User>")
     * @Serializer\Inline()
     */
    private $users;

    public function getUsers()
    {
        return $this->users;
    }
}
