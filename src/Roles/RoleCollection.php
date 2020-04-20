<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use KeycloakAdmin\Keycloak\Traits\ArrayableTrait;
use KeycloakAdmin\Keycloak\Traits\JsonableTrait;
use KeycloakAdmin\Utils\Collection;

class RoleCollection extends Collection implements \JsonSerializable
{
    use JsonableTrait;

    /**
     * @Type("array<KeycloakAdmin\Roles\Role>")
     * @Serializer\Inline()
     */
    protected $data;

    public function getRoles()
    {
        return $this->data;
    }

    public function toArray(array $array = [])
    {
        if (empty($array)) {
            $array = $this->data;
        }

        return array_map(function ($item) {
            if (is_array($item)) {
                return $this->toArray($item);
            }

            if (is_object($item)) {
                return $item->toArray();
            }

            return $item;
        }, array_filter($array, function ($item) {
            return null !== $item;
        }));
    }
}
