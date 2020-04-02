<?php

declare(strict_types=1);

namespace KeycloakAdmin\Traits;

trait ArrayableTrait
{
    public function toArray()
    {
        return array_filter(get_object_vars($this), function ($item) {
            return null !== $item;
        });
    }
}
