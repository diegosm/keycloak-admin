<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class RealmCollection
{
    /**
     * @Type("array<KeycloakAdmin\Realms\Realm>")
     * @Serializer\Inline()
     */
    private $realms;

    public function getRealms()
    {
        return $this->realms;
    }
}