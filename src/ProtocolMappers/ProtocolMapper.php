<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use KeycloakAdmin\Keycloak\Traits\ArrayableTrait;
use KeycloakAdmin\Keycloak\Traits\JsonableTrait;

class ProtocolMapper implements \JsonSerializable
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
    private $protocol;

    /**
     * @Type("string")
     * @Serializer\SerializedName("protocolMapper")
     */
    private $protocolMapper;

    /**
     * @Type("boolean")
     * @Serializer\SerializedName("consentRequired")
     */
    private $consentRequired;

    /**
     * @Type("array")
     */
    private $config;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ProtocolMapper
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
     * @return ProtocolMapper
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
     * @return ProtocolMapper
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtocolMapper()
    {
        return $this->protocolMapper;
    }

    /**
     * @param mixed $protocolMapper
     * @return ProtocolMapper
     */
    public function setProtocolMapper($protocolMapper)
    {
        $this->protocolMapper = $protocolMapper;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConsentRequired()
    {
        return $this->consentRequired;
    }

    /**
     * @param mixed $consentRequired
     * @return ProtocolMapper
     */
    public function setConsentRequired($consentRequired)
    {
        $this->consentRequired = $consentRequired;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     * @return ProtocolMapper
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }
}
