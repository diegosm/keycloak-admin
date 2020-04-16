<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use KeycloakAdmin\Keycloak\Traits\ArrayableTrait;
use KeycloakAdmin\Keycloak\Traits\JsonableTrait;

class Client implements \JsonSerializable
{
    use JsonableTrait, ArrayableTrait;

    /**
     * @Type("string")
     */
    private $id;

    /**
     * @Type("array")
     */
    private $access;

    /**
     * @Type("string")
     * @SerializedName("adminUrl")
     */
    private $adminUrl;

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
     * @SerializedName("authorizationServicesEnabled")
     */
    private $authorizationServicesEnabled;

    /**
     * @Type("array")
     * @SerializedName("authorizationSettings")
     */
    private $authorizationSettings;

    /**
     * @Type("string")
     * @SerializedName("baseUrl")
     */
    private $baseUrl;

    /**
     * @Type("boolean")
     * @SerializedName("bearerOnly")
     */
    private $bearerOnly;

    /**
     * @Type("string")
     * @SerializedName("clientAuthenticatorType")
     */
    private $clientAuthenticatorType;

    /**
     * @Type("string")
     * @SerializedName("clientId")
     */
    private $clientId;

    /**
     * @Type("boolean")
     * @SerializedName("consentRequired")
     */
    private $consentRequired;

    /**
     * @Type("array")
     * @SerializedName("defaultClientScopes")
     */
    private $defaultClientScopes;

    /**
     * @Type("array")
     * @SerializedName("defaultRoles")
     */
    private $defaultRoles;

    /**
     * @Type("string")
     * @SerializedName("description")
     */
    private $description;

    /**
     * @Type("boolean")
     * @SerializedName("directAccessGrantsEnabled")
     */
    private $directAccessGrantsEnabled;

    /**
     * @Type("boolean")
     */
    private $enabled;

    /**
     * @Type("boolean")
     * @SerializedName("frontchannelLogout")
     */
    private $frontchannelLogout;

    /**
     * @Type("boolean")
     * @SerializedName("fullScopeAllowed")
     */
    private $fullScopeAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("implicitFlowEnabled")
     */
    private $implicitFlowEnabled;

    /**
     * @Type("string")
     */
    private $name;

    /**
     * @Type("integer")
     * @SerializedName("nodeReRegistrationTimeout")
     */
    private $nodeReRegistrationTimeout;

    /**
     * @Type("integer")
     * @SerializedName("notBefore")
     */
    private $notBefore;

    /**
     * @Type("array")
     * @SerializedName("optionalClientScopes")
     */
    private $optionalClientScopes;

    /**
     * @Type("string")
     */
    private $origin;

    /**
     * @Type("string")
     */
    private $protocol;

    /**
     * @Type("array<KeycloakAdmin\ProtocolMappers\ProtocolMapper>")
     * @SerializedName("protocolMappers")
     */
    private $protocolMappers;

    /**
     * @Type("boolean")
     * @SerializedName("publicClient")
     */
    private $publicClient;

    /**
     * @Type("array")
     * @SerializedName("redirectUris")
     */
    private $redirectUris;

    /**
     * @Type("array")
     * @SerializedName("registeredNodes")
     */
    private $registeredNodes;

    /**
     * @Type("string")
     * @SerializedName("registrationAccessToken")
     */
    private $registrationAccessToken;

    /**
     * @Type("string")
     * @SerializedName("rootUrl")
     */
    private $rootUrl;

    /**
     * @Type("string")
     */
    private $secret;

    /**
     * @Type("boolean")
     * @SerializedName("serviceAccountsEnabled")
     */
    private $serviceAccountsEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("standardFlowEnabled")
     */
    private $standardFlowEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("surrogateAuthRequired")
     */
    private $surrogateAuthRequired;

    /**
     * @Type("array")
     * @SerializedName("webOrigins")
     */
    private $webOrigins;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Client
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminUrl()
    {
        return $this->adminUrl;
    }

    /**
     * @param mixed $adminUrl
     * @return Client
     */
    public function setAdminUrl($adminUrl)
    {
        $this->adminUrl = $adminUrl;
        return $this;
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
     * @return Client
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
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
     * @return Client
     */
    public function setAuthenticationFlowBindingOverrides($authenticationFlowBindingOverrides)
    {
        $this->authenticationFlowBindingOverrides = $authenticationFlowBindingOverrides;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationServicesEnabled()
    {
        return $this->authorizationServicesEnabled;
    }

    /**
     * @param mixed $authorizationServicesEnabled
     * @return Client
     */
    public function setAuthorizationServicesEnabled($authorizationServicesEnabled)
    {
        $this->authorizationServicesEnabled = $authorizationServicesEnabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationSettings()
    {
        return $this->authorizationSettings;
    }

    /**
     * @param mixed $authorizationSettings
     * @return Client
     */
    public function setAuthorizationSettings($authorizationSettings)
    {
        $this->authorizationSettings = $authorizationSettings;
        return $this;
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
     * @return Client
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
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
     * @return Client
     */
    public function setBearerOnly($bearerOnly)
    {
        $this->bearerOnly = $bearerOnly;
        return $this;
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
     * @return Client
     */
    public function setClientAuthenticatorType($clientAuthenticatorType)
    {
        $this->clientAuthenticatorType = $clientAuthenticatorType;
        return $this;
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
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
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
     * @return Client
     */
    public function setConsentRequired($consentRequired)
    {
        $this->consentRequired = $consentRequired;
        return $this;
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
     * @return Client
     */
    public function setDefaultClientScopes($defaultClientScopes)
    {
        $this->defaultClientScopes = $defaultClientScopes;
        return $this;
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
     * @return Client
     */
    public function setDefaultRoles($defaultRoles)
    {
        $this->defaultRoles = $defaultRoles;
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
     * @return Client
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
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
     * @return Client
     */
    public function setDirectAccessGrantsEnabled($directAccessGrantsEnabled)
    {
        $this->directAccessGrantsEnabled = $directAccessGrantsEnabled;
        return $this;
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
     * @return Client
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
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
     * @return Client
     */
    public function setFrontchannelLogout($frontchannelLogout)
    {
        $this->frontchannelLogout = $frontchannelLogout;
        return $this;
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
     * @return Client
     */
    public function setFullScopeAllowed($fullScopeAllowed)
    {
        $this->fullScopeAllowed = $fullScopeAllowed;
        return $this;
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
     * @return Client
     */
    public function setImplicitFlowEnabled($implicitFlowEnabled)
    {
        $this->implicitFlowEnabled = $implicitFlowEnabled;
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
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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
     * @return Client
     */
    public function setNodeReRegistrationTimeout($nodeReRegistrationTimeout)
    {
        $this->nodeReRegistrationTimeout = $nodeReRegistrationTimeout;
        return $this;
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
     * @return Client
     */
    public function setNotBefore($notBefore)
    {
        $this->notBefore = $notBefore;
        return $this;
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
     * @return Client
     */
    public function setOptionalClientScopes($optionalClientScopes)
    {
        $this->optionalClientScopes = $optionalClientScopes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param mixed $origin
     * @return Client
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
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
     * @return Client
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
     * @return Client
     */
    public function setProtocolMappers($protocolMappers)
    {
        $this->protocolMappers = $protocolMappers;
        return $this;
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
     * @return Client
     */
    public function setPublicClient($publicClient)
    {
        $this->publicClient = $publicClient;
        return $this;
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
     * @return Client
     */
    public function setRedirectUris($redirectUris)
    {
        $this->redirectUris = $redirectUris;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegisteredNodes()
    {
        return $this->registeredNodes;
    }

    /**
     * @param mixed $registeredNodes
     * @return Client
     */
    public function setRegisteredNodes($registeredNodes)
    {
        $this->registeredNodes = $registeredNodes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrationAccessToken()
    {
        return $this->registrationAccessToken;
    }

    /**
     * @param mixed $registrationAccessToken
     * @return Client
     */
    public function setRegistrationAccessToken($registrationAccessToken)
    {
        $this->registrationAccessToken = $registrationAccessToken;
        return $this;
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
     * @return Client
     */
    public function setRootUrl($rootUrl)
    {
        $this->rootUrl = $rootUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     * @return Client
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
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
     * @return Client
     */
    public function setServiceAccountsEnabled($serviceAccountsEnabled)
    {
        $this->serviceAccountsEnabled = $serviceAccountsEnabled;
        return $this;
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
     * @return Client
     */
    public function setStandardFlowEnabled($standardFlowEnabled)
    {
        $this->standardFlowEnabled = $standardFlowEnabled;
        return $this;
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
     * @return Client
     */
    public function setSurrogateAuthRequired($surrogateAuthRequired)
    {
        $this->surrogateAuthRequired = $surrogateAuthRequired;
        return $this;
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
     * @return Client
     */
    public function setWebOrigins($webOrigins)
    {
        $this->webOrigins = $webOrigins;
        return $this;
    }
}
