<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Client
{
    /**
     * @Type("string")
     */
    private $id;

    /**
     * @Type("string")
     * @SerializedName("clientId")
     */
    private $clientId;

    /**
     * @Type("string")
     */
    private $name;

    /**
     * @Type("string")
     * @SerializedName("rootUrl")
     */
    private $rootUrl;

    /**
     * @Type("string")
     * @SerializedName("baseUrl")
     */
    private $baseUrl;

    /**
     * @Type("boolean")
     * @SerializedName("surrogateAuthRequired")
     */
    private $surrogateAuthRequired;

    /**
     * @Type("boolean")
     */
    private $enabled;

    /**
     * @Type("boolean")
     * @SerializedName("alwaysDisplayInConsole")
     */
    private $alwaysDisplayInConsole;

    /**
     * @Type("string")
     * @SerializedName("clientAuthenticatorType")
     */
    private $clientAuthenticatorType;

    /**
     * @Type("array")
     * @SerializedName("defaultRoles")
     */
    private $defaultRoles;

    /**
     * @Type("array")
     * @SerializedName("redirectUris")
     */
    private $redirectUris;

    /**
     * @Type("array")
     * @SerializedName("webOrigins")
     */
    private $webOrigins;

    /**
     * @Type("integer")
     * @SerializedName("notBefore")
     */
    private $notBefore;

    /**
     * @Type("boolean")
     * @SerializedName("bearerOnly")
     */
    private $bearerOnly;

    /**
     * @Type("boolean")
     * @SerializedName("consentRequired")
     */
    private $consentRequired;

    /**
     * @Type("boolean")
     * @SerializedName("standardFlowEnabled")
     */
    private $standardFlowEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("implicitFlowEnabled")
     */
    private $implicitFlowEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("directAccessGrantsEnabled")
     */
    private $directAccessGrantsEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("serviceAccountsEnabled")
     */
    private $serviceAccountsEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("publicClient")
     */
    private $publicClient;

    /**
     * @Type("boolean")
     * @SerializedName("frontchannelLogout")
     */
    private $frontchannelLogout;

    /**
     * @Type("string")
     */
    private $protocol;

    /**
     * @Type("array")
     */
    private $attributes;

    /**
     * @Type("array")
     * @SerializedName("authenticationFlowBindingOverrides")
     */
    private $authenticationFlowBindingOverrides;

    /**
     * @Type("boolean")
     * @SerializedName("fullScopeAllowed")
     */
    private $fullScopeAllowed;

    /**
     * @Type("integer")
     * @SerializedName("nodeReRegistrationTimeout")
     */
    private $nodeReRegistrationTimeout;

    /**
     * @Type("array<KeycloakAdmin\Clients\ProtocolMapper>")
     * @SerializedName("protocolMappers")
     */
    private $protocolMappers;

    /**
     * @Type("array")
     * @SerializedName("defaultClientScopes")
     */
    private $defaultClientScopes;

    /**
     * @Type("array")
     * @SerializedName("optionalClientScopes")
     */
    private $optionalClientScopes;

    /**
     * @Type("array")
     */
    private $access;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId): void
    {
        $this->clientId = $clientId;
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
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRootUrl()
    {
        return $this->rootUrl;
    }

    /**
     * @param mixed $rootUrl
     */
    public function setRootUrl($rootUrl): void
    {
        $this->rootUrl = $rootUrl;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getSurrogateAuthRequired()
    {
        return $this->surrogateAuthRequired;
    }

    /**
     * @param mixed $surrogateAuthRequired
     */
    public function setSurrogateAuthRequired($surrogateAuthRequired): void
    {
        $this->surrogateAuthRequired = $surrogateAuthRequired;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getAlwaysDisplayInConsole()
    {
        return $this->alwaysDisplayInConsole;
    }

    /**
     * @param mixed $alwaysDisplayInConsole
     */
    public function setAlwaysDisplayInConsole($alwaysDisplayInConsole): void
    {
        $this->alwaysDisplayInConsole = $alwaysDisplayInConsole;
    }

    /**
     * @return mixed
     */
    public function getClientAuthenticatorType()
    {
        return $this->clientAuthenticatorType;
    }

    /**
     * @param mixed $clientAuthenticatorType
     */
    public function setClientAuthenticatorType($clientAuthenticatorType): void
    {
        $this->clientAuthenticatorType = $clientAuthenticatorType;
    }

    /**
     * @return mixed
     */
    public function getDefaultRoles()
    {
        return $this->defaultRoles;
    }

    /**
     * @param mixed $defaultRoles
     */
    public function setDefaultRoles($defaultRoles): void
    {
        $this->defaultRoles = $defaultRoles;
    }

    /**
     * @return mixed
     */
    public function getRedirectUris()
    {
        return $this->redirectUris;
    }

    /**
     * @param mixed $redirectUris
     */
    public function setRedirectUris($redirectUris): void
    {
        $this->redirectUris = $redirectUris;
    }

    /**
     * @return mixed
     */
    public function getWebOrigins()
    {
        return $this->webOrigins;
    }

    /**
     * @param mixed $webOrigins
     */
    public function setWebOrigins($webOrigins): void
    {
        $this->webOrigins = $webOrigins;
    }

    /**
     * @return mixed
     */
    public function getNotBefore()
    {
        return $this->notBefore;
    }

    /**
     * @param mixed $notBefore
     */
    public function setNotBefore($notBefore): void
    {
        $this->notBefore = $notBefore;
    }

    /**
     * @return mixed
     */
    public function getBearerOnly()
    {
        return $this->bearerOnly;
    }

    /**
     * @param mixed $bearerOnly
     */
    public function setBearerOnly($bearerOnly): void
    {
        $this->bearerOnly = $bearerOnly;
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
     */
    public function setConsentRequired($consentRequired): void
    {
        $this->consentRequired = $consentRequired;
    }

    /**
     * @return mixed
     */
    public function getStandardFlowEnabled()
    {
        return $this->standardFlowEnabled;
    }

    /**
     * @param mixed $standardFlowEnabled
     */
    public function setStandardFlowEnabled($standardFlowEnabled): void
    {
        $this->standardFlowEnabled = $standardFlowEnabled;
    }

    /**
     * @return mixed
     */
    public function getImplicitFlowEnabled()
    {
        return $this->implicitFlowEnabled;
    }

    /**
     * @param mixed $implicitFlowEnabled
     */
    public function setImplicitFlowEnabled($implicitFlowEnabled): void
    {
        $this->implicitFlowEnabled = $implicitFlowEnabled;
    }

    /**
     * @return mixed
     */
    public function getDirectAccessGrantsEnabled()
    {
        return $this->directAccessGrantsEnabled;
    }

    /**
     * @param mixed $directAccessGrantsEnabled
     */
    public function setDirectAccessGrantsEnabled($directAccessGrantsEnabled): void
    {
        $this->directAccessGrantsEnabled = $directAccessGrantsEnabled;
    }

    /**
     * @return mixed
     */
    public function getServiceAccountsEnabled()
    {
        return $this->serviceAccountsEnabled;
    }

    /**
     * @param mixed $serviceAccountsEnabled
     */
    public function setServiceAccountsEnabled($serviceAccountsEnabled): void
    {
        $this->serviceAccountsEnabled = $serviceAccountsEnabled;
    }

    /**
     * @return mixed
     */
    public function getPublicClient()
    {
        return $this->publicClient;
    }

    /**
     * @param mixed $publicClient
     */
    public function setPublicClient($publicClient): void
    {
        $this->publicClient = $publicClient;
    }

    /**
     * @return mixed
     */
    public function getFrontchannelLogout()
    {
        return $this->frontchannelLogout;
    }

    /**
     * @param mixed $frontchannelLogout
     */
    public function setFrontchannelLogout($frontchannelLogout): void
    {
        $this->frontchannelLogout = $frontchannelLogout;
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
     */
    public function setProtocol($protocol): void
    {
        $this->protocol = $protocol;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationFlowBindingOverrides()
    {
        return $this->authenticationFlowBindingOverrides;
    }

    /**
     * @param mixed $authenticationFlowBindingOverrides
     */
    public function setAuthenticationFlowBindingOverrides($authenticationFlowBindingOverrides): void
    {
        $this->authenticationFlowBindingOverrides = $authenticationFlowBindingOverrides;
    }

    /**
     * @return mixed
     */
    public function getFullScopeAllowed()
    {
        return $this->fullScopeAllowed;
    }

    /**
     * @param mixed $fullScopeAllowed
     */
    public function setFullScopeAllowed($fullScopeAllowed): void
    {
        $this->fullScopeAllowed = $fullScopeAllowed;
    }

    /**
     * @return mixed
     */
    public function getNodeReRegistrationTimeout()
    {
        return $this->nodeReRegistrationTimeout;
    }

    /**
     * @param mixed $nodeReRegistrationTimeout
     */
    public function setNodeReRegistrationTimeout($nodeReRegistrationTimeout): void
    {
        $this->nodeReRegistrationTimeout = $nodeReRegistrationTimeout;
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
     */
    public function setProtocolMappers($protocolMappers): void
    {
        $this->protocolMappers = $protocolMappers;
    }

    /**
     * @return mixed
     */
    public function getDefaultClientScopes()
    {
        return $this->defaultClientScopes;
    }

    /**
     * @param mixed $defaultClientScopes
     */
    public function setDefaultClientScopes($defaultClientScopes): void
    {
        $this->defaultClientScopes = $defaultClientScopes;
    }

    /**
     * @return mixed
     */
    public function getOptionalClientScopes()
    {
        return $this->optionalClientScopes;
    }

    /**
     * @param mixed $optionalClientScopes
     */
    public function setOptionalClientScopes($optionalClientScopes): void
    {
        $this->optionalClientScopes = $optionalClientScopes;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param mixed $access
     */
    public function setAccess($access): void
    {
        $this->access = $access;
    }
}
