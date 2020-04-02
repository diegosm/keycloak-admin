<?php

declare(strict_types=1);

namespace KeycloakAdmin\IdentityProviders;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class IdentityProvider
{
    /**
     * @Type("string")
     */
    private $alias;

    /**
     * @Type("string")
     * @SerializedName("internalId")
     */
    private $internalId;

    /**
     * @Type("string")
     * @SerializedName("providerId")
     */
    private $providerId;

    /**
     * @Type("boolean")
     * @SerializedName("enabled")
     */
    private $enabled;

    /**
     * @Type("string")
     * @SerializedName("updateProfileFirstLoginMode")
     */
    private $updateProfileFirstLoginMode;

    /**
     * @Type("boolean")
     * @SerializedName("trustEmail")
     */
    private $trustEmail;

    /**
     * @Type("boolean")
     * @SerializedName("storeToken")
     */
    private $storeToken;

    /**
     * @Type("boolean")
     * @SerializedName("addReadTokenRoleOnCreate")
     */
    private $addReadTokenRoleOnCreate;

    /**
     * @Type("boolean")
     * @SerializedName("authenticateByDefault")
     */
    private $authenticateByDefault;

    /**
     * @Type("boolean")
     * @SerializedName("linkOnly")
     */
    private $linkOnly;

    /**
     * @Type("string")
     * @SerializedName("firstBrokerLoginFlowAlias")
     */
    private $firstBrokerLoginFlowAlias;

    /**
     * @Type("array")
     * @SerializedName("config")
     */
    private $config;

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    public function getInternalId()
    {
        return $this->internalId;
    }

    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;
        return $this;
    }

    public function getProviderId()
    {
        return $this->providerId;
    }

    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
        return $this;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function getUpdateProfileFirstLoginMode()
    {
        return $this->updateProfileFirstLoginMode;
    }

    public function setUpdateProfileFirstLoginMode($updateProfileFirstLoginMode)
    {
        $this->updateProfileFirstLoginMode = $updateProfileFirstLoginMode;
        return $this;
    }

    public function getTrustEmail()
    {
        return $this->trustEmail;
    }

    public function setTrustEmail($trustEmail)
    {
        $this->trustEmail = $trustEmail;
        return $this;
    }

    public function getStoreToken()
    {
        return $this->storeToken;
    }

    public function setStoreToken($storeToken)
    {
        $this->storeToken = $storeToken;
        return $this;
    }

    public function getAddReadTokenRoleOnCreate()
    {
        return $this->addReadTokenRoleOnCreate;
    }

    public function setAddReadTokenRoleOnCreate($addReadTokenRoleOnCreate)
    {
        $this->addReadTokenRoleOnCreate = $addReadTokenRoleOnCreate;
        return $this;
    }

    public function getAuthenticateByDefault()
    {
        return $this->authenticateByDefault;
    }

    public function setAuthenticateByDefault($authenticateByDefault)
    {
        $this->authenticateByDefault = $authenticateByDefault;
        return $this;
    }

    public function getLinkOnly()
    {
        return $this->linkOnly;
    }

    public function setLinkOnly($linkOnly)
    {
        $this->linkOnly = $linkOnly;
        return $this;
    }

    public function getFirstBrokerLoginFlowAlias()
    {
        return $this->firstBrokerLoginFlowAlias;
    }

    public function setFirstBrokerLoginFlowAlias($firstBrokerLoginFlowAlias)
    {
        $this->firstBrokerLoginFlowAlias = $firstBrokerLoginFlowAlias;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }
}
