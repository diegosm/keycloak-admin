<?php

declare(strict_types=1);

namespace KeycloakAdmin\Traits;

trait CreatableTrait
{
    public function createFromArray(array $data = []) : self
    {
        $this->resource = $this->deserialize(json_encode($data));
        return $this;
    }

    public function createFromJson(string $data) : self
    {
        $this->resource = $this->deserialize($data);
        return $this;
    }
}