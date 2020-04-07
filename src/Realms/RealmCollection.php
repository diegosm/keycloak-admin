<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use KeycloakAdmin\Utils\Collection;

class RealmCollection extends Collection
{
    /**
     * @Type("array<KeycloakAdmin\Realms\Realm>")
     * @Serializer\Inline()
     */
    protected $data;

    public function getRealms()
    {
        return $this->data;
    }
}
