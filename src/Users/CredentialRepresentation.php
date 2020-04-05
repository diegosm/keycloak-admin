<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class CredentialRepresentation
{
    /**
     * @Type("string")
     */
    private $algorithm;

    /**
     * @Type("array")
     */
    private $config;

    /**
     * @Type("integer")
     */
    private $counter;

    /**
     * @Type("integer")
     * @SerializedName("createdDate")
     */
    private $createdDate;

    /**
     * @Type("string")
     */
    private $device;

    /**
     * @Type("integer")
     */
    private $digits;

    /**
     * @Type("integer")
     * @SerializedName("hashInterations")
     */
    private $hashIterations;

    /**
     * @Type("string")
     * @SerializedName("hashedSaltedValue")
     */
    private $hashedSaltedValue;

    /**
     * @Type("integer")
     */
    private $period;

    /**
     * @Type("string")
     */
    private $salt;

    /**
     * @Type("boolean")
     */
    private $temporary;

    /**
     * @Type("string")
     */
    private $type;

    /**
     * @Type("string")
     */
    private $value;

    /**
     * @return mixed
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @param mixed $algorithm
     * @return CredentialRepresentation
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
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
     * @return CredentialRepresentation
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param mixed $counter
     * @return CredentialRepresentation
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     * @return CredentialRepresentation
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     * @return CredentialRepresentation
     */
    public function setDevice($device)
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDigits()
    {
        return $this->digits;
    }

    /**
     * @param mixed $digits
     * @return CredentialRepresentation
     */
    public function setDigits($digits)
    {
        $this->digits = $digits;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHashIterations()
    {
        return $this->hashIterations;
    }

    /**
     * @param mixed $hashIterations
     * @return CredentialRepresentation
     */
    public function setHashIterations($hashIterations)
    {
        $this->hashIterations = $hashIterations;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHashedSaltedValue()
    {
        return $this->hashedSaltedValue;
    }

    /**
     * @param mixed $hashedSaltedValue
     * @return CredentialRepresentation
     */
    public function setHashedSaltedValue($hashedSaltedValue)
    {
        $this->hashedSaltedValue = $hashedSaltedValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     * @return CredentialRepresentation
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     * @return CredentialRepresentation
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemporary()
    {
        return $this->temporary;
    }

    /**
     * @param mixed $temporary
     * @return CredentialRepresentation
     */
    public function setTemporary($temporary)
    {
        $this->temporary = $temporary;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return CredentialRepresentation
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return CredentialRepresentation
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
