<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use KeycloakAdmin\Keycloak\Traits\ArrayableTrait;
use KeycloakAdmin\Keycloak\Traits\JsonableTrait;

class ClientScope implements \JsonSerializable
{
    use JsonableTrait, ArrayableTrait;

    /**
     * @Type("array")
     */
    private $attributes;

    /**
     * @Type("string")
     */
    private $description;

    /**
     * @Type("string")
     */
    private $id;

    /**
     * @Type("string")
     */
    private $name;

    /**
     * @Type("string")
     */
    private $protocol;

    /**
     * @Type("KeycloakAdmin\ProtocolMappers\ProtocolMapperCollection")
     * @SerializedName("protocolMappers")
     */
    private $protocolMappers;

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     * @return ClientScope
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return ClientScope
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ClientScope
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return ClientScope
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     * @return ClientScope
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtocolMappers()
    {
        return $this->protocolMappers;
    }

    /**
     * @param mixed $protocolMappers
     * @return ClientScope
     */
    public function setProtocolMappers($protocolMappers)
    {
        $this->protocolMappers = $protocolMappers;
        return $this;
    }
}
