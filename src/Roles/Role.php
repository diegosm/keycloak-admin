<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use KeycloakAdmin\Traits\ArrayableTrait;
use KeycloakAdmin\Traits\JsonableTrait;

class Role implements \JsonSerializable
{
    use JsonableTrait, ArrayableTrait;

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
    private $description;

    /**
     * @Type("boolean")
     */
    private $composite;

    /**
     * @Type("boolean")
     * @SerializedName("clientRole")
     */
    private $clientRole;

    /**
     * @Type("string")
     * @SerializedName("containerId")
     */
    private $containerId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Role
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
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Role
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComposite()
    {
        return $this->composite;
    }

    /**
     * @param mixed $composite
     * @return Role
     */
    public function setComposite($composite)
    {
        $this->composite = $composite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientRole()
    {
        return $this->clientRole;
    }

    /**
     * @param mixed $clientRole
     * @return Role
     */
    public function setClientRole($clientRole)
    {
        $this->clientRole = $clientRole;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param mixed $containerId
     * @return Role
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
        return $this;
    }
}
