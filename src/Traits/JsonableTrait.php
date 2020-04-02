<?php

declare(strict_types=1);

namespace KeycloakAdmin\Traits;

trait JsonableTrait
{
    public function jsonSerialize()
    {
        return json_encode(array_filter(get_object_vars($this), function ($item) {
            return null !== $item;
        }));
    }
}