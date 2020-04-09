<?php

declare(strict_types=1);

namespace KeycloakAdmin\Traits;

trait ArrayableTrait
{
    public function toArray(array $array = [])
    {
        if (empty($array)) {
            $array = get_object_vars($this);
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
