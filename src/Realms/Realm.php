<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use KeycloakAdmin\Traits\ArrayableTrait;
use KeycloakAdmin\Traits\JsonableTrait;

class Realm implements \JsonSerializable
{
    use JsonableTrait, ArrayableTrait;

    /**
     * @Type("string")
     */
    private $id;

    /**
     * @Type("integer")
     * @SerializedName("accessCodeLifespan")
     */
    private $accessCodeLifespan;

    /**
     * @Type("integer")
     * @SerializedName("accessCodeLifespanLogin")
     */
    private $accessCodeLifespanLogin;

    /**
     * @Type("integer")
     * @SerializedName("accessCodeLifespanUserAction")
     */
    private $accessCodeLifespanUserAction;

    /**
     * @Type("integer")
     * @SerializedName("accessTokenLifespan")
     */
    private $accessTokenLifespan;

    /**
     * @Type("integer")
     * @SerializedName("accessTokenLifespanForImplicitFlow")
     */
    private $accessTokenLifespanForImplicitFlow;

    /**
     * @Type("string")
     * @SerializedName("accountTheme")
     */
    private $accountTheme;

    /**
     * @Type("integer")
     * @SerializedName("actionTokenGeneratedByAdminLifespan")
     */
    private $actionTokenGeneratedByAdminLifespan;

    /**
     * @Type("integer")
     * @SerializedName("actionTokenGeneratedByUserLifespan")
     */
    private $actionTokenGeneratedByUserLifespan;

    /**
     * @Type("boolean")
     * @SerializedName("adminEventsDetailsEnabled")
     */
    private $adminEventsDetailsEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("adminEventsEnabled")
     */
    private $adminEventsEnabled;

    /**
     * @Type("string")
     * @SerializedName("adminTheme")
     */
    private $adminTheme;

    /**
     * @Type("array")
     */
    private $attributes;

    /**
     * @Type("array")
     * @SerializedName("authenticationFlows")
     */
    private $authenticationFlows;

    /**
     * @Type("array")
     * @SerializedName("authenticatorConfig")
     */
    private $authenticatorConfig;

    /**
     * @Type("string")
     * @SerializedName("browserFlow")
     */
    private $browserFlow;

    /**
     * @Type("array")
     * @SerializedName("browserSecurityHeaders")
     */
    private $browserSecurityHeaders;

    /**
     * @Type("boolean")
     * @SerializedName("bruteForceProtected")
     */
    private $bruteForceProtected;

    /**
     * @Type("string")
     * @SerializedName("clientAuthenticationFlow")
     */
    private $clientAuthenticationFlow;

    /**
     * @Type("array")
     * @SerializedName("clientScopeMappings")
     */
    private $clientScopeMappings;

    /**
     * @Type("array")
     * @SerializedName("clientScopes")
     */
    private $clientScopes;

    /**
     * @Type("array<KeycloakAdmin\Clients\Client>")
     */
    private $clients;

    /**
     * @Type("array")
     */
    private $components;

    /**
     * @Type("array")
     * @SerializedName("defaultDefaultClientScopes")
     */
    private $defaultDefaultClientScopes;

    /**
     * @Type("defaultGroups")
     * @SerializedName("defaultGroups")
     */
    private $defaultGroups;

    /**
     * @Type("string")
     * @SerializedName("defaultLocale")
     */
    private $defaultLocale;

    /**
     * @Type("array")
     * @SerializedName("defaultOptionalClientScopes")
     */
    private $defaultOptionalClientScopes;

    /**
     * @Type("array")
     * @SerializedName("defaultRoles")
     */
    private $defaultRoles;

    /**
     * @Type("string")
     * @SerializedName("defaultSignatureAlgorithm")
     */
    private $defaultSignatureAlgorithm;

    /**
     * @Type("string")
     * @SerializedName("directGrantFlow")
     */
    private $directGrantFlow;

    /**
     * @Type("string")
     * @SerializedName("displayName")
     */
    private $displayName;

    /**
     * @Type("string")
     * @SerializedName("displayNameHtml")
     */
    private $displayNameHtml;

    /**
     * @Type("string")
     * @SerializedName("dockerAuthenticationFlow")
     */
    private $dockerAuthenticationFlow;

    /**
     * @Type("boolean")
     * @SerializedName("duplicateEmailsAllowed")
     */
    private $duplicateEmailsAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("editUsernameAllowed")
     */
    private $editUsernameAllowed;

    /**
     * @Type("string")
     * @SerializedName("emailTheme")
     */
    private $emailTheme;

    /**
     * @Type("boolean")
     */
    private $enabled;

    /**
     * @Type("array")
     */
    private $enabledEventTypes;

    /**
     * @Type("boolean")
     * @SerializedName("eventsEnabled")
     */
    private $eventsEnabled;

    /**
     * @Type("integer")
     * @SerializedName("eventsExpiration")
     */
    private $eventsExpiration;

    /**
     * @Type("array")
     * @SerializedName("eventsListeners")
     */
    private $eventsListeners;

    /**
     * @Type("integer")
     * @SerializedName("failureFactor")
     */
    private $failureFactor;

    /**
     * @Type("array<KeycloakAdmin\Users\User>")
     * @SerializedName("federatedUsers")
     */
    private $federatedUsers;

    /**
     * @Type("array")
     */
    private $groups;

    /**
     * @Type("array")
     * @SerializedName("identityProviderMappers")
     */
    private $identityProviderMappers;

    /**
     * @Type("array<KeycloakAdmin\IdentityProviders\IdentityProvider>")
     */
    private $identityProviders;

    /**
     * @Type("boolean")
     * @SerializedName("internationalizationEnabled")
     */
    private $internationalizationEnabled;

    /**
     * @Type("string")
     * @SerializedName("keycloakVersion")
     */
    private $keycloakVersion;

    /**
     * @Type("string")
     * @SerializedName("loginTheme")
     */
    private $loginTheme;

    /**
     * @Type("boolean")
     * @SerializedName("loginWithEmailAllowed")
     */
    private $loginWithEmailAllowed;

    /**
     * @Type("integer")
     * @SerializedName("maxDeltaTimeSeconds")
     */
    private $maxDeltaTimeSeconds;

    /**
     * @Type("integer")
     * @SerializedName("maxFailureWaitSeconds")
     */
    private $maxFailureWaitSeconds;

    /**
     * @Type("integer")
     * @SerializedName("minimumQuickLoginWaitSeconds")
     */
    private $minimumQuickLoginWaitSeconds;

    /**
     * @Type("integer")
     * @SerializedName("notBefore")
     */
    private $notBefore;

    /**
     * @Type("integer")
     * @SerializedName("offlineSessionIdleTimeout")
     */
    private $offlineSessionIdleTimeout;

    /**
     * @Type("integer")
     * @SerializedName("offlineSessionMaxLifespan")
     */
    private $offlineSessionMaxLifespan;

    /**
     * @Type("boolean")
     * @SerializedName("offlineSessionMaxLifespanEnabled")
     */
    private $offlineSessionMaxLifespanEnabled;

    /**
     * @Type("string")
     * @SerializedName("otpPolicyAlgorithm")
     */
    private $otpPolicyAlgorithm;

    /**
     * @Type("integer")
     * @SerializedName("otpPolicyDigits")
     */
    private $otpPolicyDigits;

    /**
     * @Type("integer")
     * @SerializedName("otpPolicyInitialCounter")
     */
    private $otpPolicyInitialCounter;

    /**
     * @Type("integer")
     * @SerializedName("otpPolicyLookAheadWindow")
     */
    private $otpPolicyLookAheadWindow;

    /**
     * @Type("integer")
     * @SerializedName("otpPolicyPeriod")
     */
    private $otpPolicyPeriod;

    /**
     * @Type("string")
     * @SerializedName("otpPolicyType")
     */
    private $otpPolicyType;

    /**
     * @Type("array")
     * @SerializedName("otpSupportedApplications")
     */
    private $otpSupportedApplications;

    /**
     * @Type("string")
     * @SerializedName("passwordPolicy")
     */
    private $passwordPolicy;

    /**
     * @Type("boolean")
     * @SerializedName("permanentLockout")
     */
    private $permanentLockout;

    /**
     * @Type("array<KeycloakAdmin\ProtocolMappers\ProtocolMapper>")
     * @SerializedName("protocolMappers")
     */
    private $protocolMappers;

    /**
     * @Type("integer")
     * @SerializedName("quickLoginCheckMilliSeconds")
     */
    private $quickLoginCheckMilliSeconds;

    /**
     * @Type("string")
     */
    private $realm;

    /**
     * @Type("integer")
     * @SerializedName("refreshTokenMaxReuse")
     */
    private $refreshTokenMaxReuse;

    /**
     * @Type("boolean")
     * @SerializedName("registrationAllowed")
     */
    private $registrationAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("registrationEmailAsUsername")
     */
    private $registrationEmailAsUsername;

    /**
     * @Type("string")
     * @SerializedName("registrationFlow")
     */
    private $registrationFlow;

    /**
     * @Type("boolean")
     * @SerializedName("rememberMe")
     */
    private $rememberMe;

    /**
     * @Type("array")
     * @SerializedName("requiredActions")
     */
    private $requiredActions;

    /**
     * @Type("string")
     * @SerializedName("resetCredentialsFlow")
     */
    private $resetCredentialsFlow;

    /**
     * @Type("boolean")
     * @SerializedName("resetPasswordAllowed")
     */
    private $resetPasswordAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("revokeRefreshToken")
     */
    private $revokeRefreshToken;

    /**
     * @Type("KeycloakAdmin\Roles\RoleCollection")
     */
    private $roles;

    /**
     * @Type("array")
     * @SerializedName("scopeMappings")
     */
    private $scopeMappings;

    /**
     * @Type("array")
     * @SerializedName("smtpServer")
     */
    private $smtpServer;

    /**
     * @Type("string")
     */
    private $sslRequired;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionIdleTimeout")
     */
    private $ssoSessionIdleTimeout;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionIdleTimeoutRememberMe")
     */
    private $ssoSessionIdleTimeoutRememberMe;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionMaxLifespan")
     */
    private $ssoSessionMaxLifespan;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionMaxLifespanRememberMe")
     */
    private $ssoSessionMaxLifespanRememberMe;

    /**
     * @Type("array")
     * @SerializedName("supportedLocales")
     */
    private $supportedLocales;

    /**
     * @Type("array")
     * @SerializedName("userFederationMappers")
     */
    private $userFederationMappers;

    /**
     * @Type("array")
     * @SerializedName("userFederationProviders")
     */
    private $userFederationProviders;

    /**
     * @Type("boolean")
     * @SerializedName("userManagedAccessAllowed")
     */
    private $userManagedAccessAllowed;

    /**
     * @Type("KeycloakAdmin\Users\UserCollection")
     * @SerializedName("users")
     */
    private $users;

    /**
     * @Type("boolean")
     * @SerializedName("verifyEmail")
     */
    private $verifyEmail;

    /**
     * @Type("integer")
     * @SerializedName("waitIncrementSeconds")
     */
    private $waitIncrementSeconds;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Realm
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessCodeLifespan()
    {
        return $this->accessCodeLifespan;
    }

    /**
     * @param mixed $accessCodeLifespan
     * @return Realm
     */
    public function setAccessCodeLifespan($accessCodeLifespan)
    {
        $this->accessCodeLifespan = $accessCodeLifespan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessCodeLifespanLogin()
    {
        return $this->accessCodeLifespanLogin;
    }

    /**
     * @param mixed $accessCodeLifespanLogin
     * @return Realm
     */
    public function setAccessCodeLifespanLogin($accessCodeLifespanLogin)
    {
        $this->accessCodeLifespanLogin = $accessCodeLifespanLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessCodeLifespanUserAction()
    {
        return $this->accessCodeLifespanUserAction;
    }

    /**
     * @param mixed $accessCodeLifespanUserAction
     * @return Realm
     */
    public function setAccessCodeLifespanUserAction($accessCodeLifespanUserAction)
    {
        $this->accessCodeLifespanUserAction = $accessCodeLifespanUserAction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessTokenLifespan()
    {
        return $this->accessTokenLifespan;
    }

    /**
     * @param mixed $accessTokenLifespan
     * @return Realm
     */
    public function setAccessTokenLifespan($accessTokenLifespan)
    {
        $this->accessTokenLifespan = $accessTokenLifespan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessTokenLifespanForImplicitFlow()
    {
        return $this->accessTokenLifespanForImplicitFlow;
    }

    /**
     * @param mixed $accessTokenLifespanForImplicitFlow
     * @return Realm
     */
    public function setAccessTokenLifespanForImplicitFlow($accessTokenLifespanForImplicitFlow)
    {
        $this->accessTokenLifespanForImplicitFlow = $accessTokenLifespanForImplicitFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccountTheme()
    {
        return $this->accountTheme;
    }

    /**
     * @param mixed $accountTheme
     * @return Realm
     */
    public function setAccountTheme($accountTheme)
    {
        $this->accountTheme = $accountTheme;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActionTokenGeneratedByAdminLifespan()
    {
        return $this->actionTokenGeneratedByAdminLifespan;
    }

    /**
     * @param mixed $actionTokenGeneratedByAdminLifespan
     * @return Realm
     */
    public function setActionTokenGeneratedByAdminLifespan($actionTokenGeneratedByAdminLifespan)
    {
        $this->actionTokenGeneratedByAdminLifespan = $actionTokenGeneratedByAdminLifespan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActionTokenGeneratedByUserLifespan()
    {
        return $this->actionTokenGeneratedByUserLifespan;
    }

    /**
     * @param mixed $actionTokenGeneratedByUserLifespan
     * @return Realm
     */
    public function setActionTokenGeneratedByUserLifespan($actionTokenGeneratedByUserLifespan)
    {
        $this->actionTokenGeneratedByUserLifespan = $actionTokenGeneratedByUserLifespan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminEventsDetailsEnabled()
    {
        return $this->adminEventsDetailsEnabled;
    }

    /**
     * @param mixed $adminEventsDetailsEnabled
     * @return Realm
     */
    public function setAdminEventsDetailsEnabled($adminEventsDetailsEnabled)
    {
        $this->adminEventsDetailsEnabled = $adminEventsDetailsEnabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminEventsEnabled()
    {
        return $this->adminEventsEnabled;
    }

    /**
     * @param mixed $adminEventsEnabled
     * @return Realm
     */
    public function setAdminEventsEnabled($adminEventsEnabled)
    {
        $this->adminEventsEnabled = $adminEventsEnabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminTheme()
    {
        return $this->adminTheme;
    }

    /**
     * @param mixed $adminTheme
     * @return Realm
     */
    public function setAdminTheme($adminTheme)
    {
        $this->adminTheme = $adminTheme;
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
     * @return Realm
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationFlows()
    {
        return $this->authenticationFlows;
    }

    /**
     * @param mixed $authenticationFlows
     * @return Realm
     */
    public function setAuthenticationFlows($authenticationFlows)
    {
        $this->authenticationFlows = $authenticationFlows;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthenticatorConfig()
    {
        return $this->authenticatorConfig;
    }

    /**
     * @param mixed $authenticatorConfig
     * @return Realm
     */
    public function setAuthenticatorConfig($authenticatorConfig)
    {
        $this->authenticatorConfig = $authenticatorConfig;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrowserFlow()
    {
        return $this->browserFlow;
    }

    /**
     * @param mixed $browserFlow
     * @return Realm
     */
    public function setBrowserFlow($browserFlow)
    {
        $this->browserFlow = $browserFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrowserSecurityHeaders()
    {
        return $this->browserSecurityHeaders;
    }

    /**
     * @param mixed $browserSecurityHeaders
     * @return Realm
     */
    public function setBrowserSecurityHeaders($browserSecurityHeaders)
    {
        $this->browserSecurityHeaders = $browserSecurityHeaders;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBruteForceProtected()
    {
        return $this->bruteForceProtected;
    }

    /**
     * @param mixed $bruteForceProtected
     * @return Realm
     */
    public function setBruteForceProtected($bruteForceProtected)
    {
        $this->bruteForceProtected = $bruteForceProtected;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientAuthenticationFlow()
    {
        return $this->clientAuthenticationFlow;
    }

    /**
     * @param mixed $clientAuthenticationFlow
     * @return Realm
     */
    public function setClientAuthenticationFlow($clientAuthenticationFlow)
    {
        $this->clientAuthenticationFlow = $clientAuthenticationFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientScopeMappings()
    {
        return $this->clientScopeMappings;
    }

    /**
     * @param mixed $clientScopeMappings
     * @return Realm
     */
    public function setClientScopeMappings($clientScopeMappings)
    {
        $this->clientScopeMappings = $clientScopeMappings;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientScopes()
    {
        return $this->clientScopes;
    }

    /**
     * @param mixed $clientScopes
     * @return Realm
     */
    public function setClientScopes($clientScopes)
    {
        $this->clientScopes = $clientScopes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param mixed $clients
     * @return Realm
     */
    public function setClients($clients)
    {
        $this->clients = $clients;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @param mixed $components
     * @return Realm
     */
    public function setComponents($components)
    {
        $this->components = $components;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultDefaultClientScopes()
    {
        return $this->defaultDefaultClientScopes;
    }

    /**
     * @param mixed $defaultDefaultClientScopes
     * @return Realm
     */
    public function setDefaultDefaultClientScopes($defaultDefaultClientScopes)
    {
        $this->defaultDefaultClientScopes = $defaultDefaultClientScopes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultGroups()
    {
        return $this->defaultGroups;
    }

    /**
     * @param mixed $defaultGroups
     * @return Realm
     */
    public function setDefaultGroups($defaultGroups)
    {
        $this->defaultGroups = $defaultGroups;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }

    /**
     * @param mixed $defaultLocale
     * @return Realm
     */
    public function setDefaultLocale($defaultLocale)
    {
        $this->defaultLocale = $defaultLocale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultOptionalClientScopes()
    {
        return $this->defaultOptionalClientScopes;
    }

    /**
     * @param mixed $defaultOptionalClientScopes
     * @return Realm
     */
    public function setDefaultOptionalClientScopes($defaultOptionalClientScopes)
    {
        $this->defaultOptionalClientScopes = $defaultOptionalClientScopes;
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
     * @return Realm
     */
    public function setDefaultRoles($defaultRoles)
    {
        $this->defaultRoles = $defaultRoles;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultSignatureAlgorithm()
    {
        return $this->defaultSignatureAlgorithm;
    }

    /**
     * @param mixed $defaultSignatureAlgorithm
     * @return Realm
     */
    public function setDefaultSignatureAlgorithm($defaultSignatureAlgorithm)
    {
        $this->defaultSignatureAlgorithm = $defaultSignatureAlgorithm;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirectGrantFlow()
    {
        return $this->directGrantFlow;
    }

    /**
     * @param mixed $directGrantFlow
     * @return Realm
     */
    public function setDirectGrantFlow($directGrantFlow)
    {
        $this->directGrantFlow = $directGrantFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param mixed $displayName
     * @return Realm
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisplayNameHtml()
    {
        return $this->displayNameHtml;
    }

    /**
     * @param mixed $displayNameHtml
     * @return Realm
     */
    public function setDisplayNameHtml($displayNameHtml)
    {
        $this->displayNameHtml = $displayNameHtml;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDockerAuthenticationFlow()
    {
        return $this->dockerAuthenticationFlow;
    }

    /**
     * @param mixed $dockerAuthenticationFlow
     * @return Realm
     */
    public function setDockerAuthenticationFlow($dockerAuthenticationFlow)
    {
        $this->dockerAuthenticationFlow = $dockerAuthenticationFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuplicateEmailsAllowed()
    {
        return $this->duplicateEmailsAllowed;
    }

    /**
     * @param mixed $duplicateEmailsAllowed
     * @return Realm
     */
    public function setDuplicateEmailsAllowed($duplicateEmailsAllowed)
    {
        $this->duplicateEmailsAllowed = $duplicateEmailsAllowed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEditUsernameAllowed()
    {
        return $this->editUsernameAllowed;
    }

    /**
     * @param mixed $editUsernameAllowed
     * @return Realm
     */
    public function setEditUsernameAllowed($editUsernameAllowed)
    {
        $this->editUsernameAllowed = $editUsernameAllowed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailTheme()
    {
        return $this->emailTheme;
    }

    /**
     * @param mixed $emailTheme
     * @return Realm
     */
    public function setEmailTheme($emailTheme)
    {
        $this->emailTheme = $emailTheme;
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
     * @return Realm
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnabledEventTypes()
    {
        return $this->enabledEventTypes;
    }

    /**
     * @param mixed $enabledEventTypes
     * @return Realm
     */
    public function setEnabledEventTypes($enabledEventTypes)
    {
        $this->enabledEventTypes = $enabledEventTypes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEventsEnabled()
    {
        return $this->eventsEnabled;
    }

    /**
     * @param mixed $eventsEnabled
     * @return Realm
     */
    public function setEventsEnabled($eventsEnabled)
    {
        $this->eventsEnabled = $eventsEnabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEventsExpiration()
    {
        return $this->eventsExpiration;
    }

    /**
     * @param mixed $eventsExpiration
     * @return Realm
     */
    public function setEventsExpiration($eventsExpiration)
    {
        $this->eventsExpiration = $eventsExpiration;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEventsListeners()
    {
        return $this->eventsListeners;
    }

    /**
     * @param mixed $eventsListeners
     * @return Realm
     */
    public function setEventsListeners($eventsListeners)
    {
        $this->eventsListeners = $eventsListeners;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFailureFactor()
    {
        return $this->failureFactor;
    }

    /**
     * @param mixed $failureFactor
     * @return Realm
     */
    public function setFailureFactor($failureFactor)
    {
        $this->failureFactor = $failureFactor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFederatedUsers()
    {
        return $this->federatedUsers;
    }

    /**
     * @param mixed $federatedUsers
     * @return Realm
     */
    public function setFederatedUsers($federatedUsers)
    {
        $this->federatedUsers = $federatedUsers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     * @return Realm
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentityProviderMappers()
    {
        return $this->identityProviderMappers;
    }

    /**
     * @param mixed $identityProviderMappers
     * @return Realm
     */
    public function setIdentityProviderMappers($identityProviderMappers)
    {
        $this->identityProviderMappers = $identityProviderMappers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentityProviders()
    {
        return $this->identityProviders;
    }

    /**
     * @param mixed $identityProviders
     * @return Realm
     */
    public function setIdentityProviders($identityProviders)
    {
        $this->identityProviders = $identityProviders;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInternationalizationEnabled()
    {
        return $this->internationalizationEnabled;
    }

    /**
     * @param mixed $internationalizationEnabled
     * @return Realm
     */
    public function setInternationalizationEnabled($internationalizationEnabled)
    {
        $this->internationalizationEnabled = $internationalizationEnabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeycloakVersion()
    {
        return $this->keycloakVersion;
    }

    /**
     * @param mixed $keycloakVersion
     * @return Realm
     */
    public function setKeycloakVersion($keycloakVersion)
    {
        $this->keycloakVersion = $keycloakVersion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoginTheme()
    {
        return $this->loginTheme;
    }

    /**
     * @param mixed $loginTheme
     * @return Realm
     */
    public function setLoginTheme($loginTheme)
    {
        $this->loginTheme = $loginTheme;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoginWithEmailAllowed()
    {
        return $this->loginWithEmailAllowed;
    }

    /**
     * @param mixed $loginWithEmailAllowed
     * @return Realm
     */
    public function setLoginWithEmailAllowed($loginWithEmailAllowed)
    {
        $this->loginWithEmailAllowed = $loginWithEmailAllowed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxDeltaTimeSeconds()
    {
        return $this->maxDeltaTimeSeconds;
    }

    /**
     * @param mixed $maxDeltaTimeSeconds
     * @return Realm
     */
    public function setMaxDeltaTimeSeconds($maxDeltaTimeSeconds)
    {
        $this->maxDeltaTimeSeconds = $maxDeltaTimeSeconds;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxFailureWaitSeconds()
    {
        return $this->maxFailureWaitSeconds;
    }

    /**
     * @param mixed $maxFailureWaitSeconds
     * @return Realm
     */
    public function setMaxFailureWaitSeconds($maxFailureWaitSeconds)
    {
        $this->maxFailureWaitSeconds = $maxFailureWaitSeconds;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinimumQuickLoginWaitSeconds()
    {
        return $this->minimumQuickLoginWaitSeconds;
    }

    /**
     * @param mixed $minimumQuickLoginWaitSeconds
     * @return Realm
     */
    public function setMinimumQuickLoginWaitSeconds($minimumQuickLoginWaitSeconds)
    {
        $this->minimumQuickLoginWaitSeconds = $minimumQuickLoginWaitSeconds;
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
     * @return Realm
     */
    public function setNotBefore($notBefore)
    {
        $this->notBefore = $notBefore;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOfflineSessionIdleTimeout()
    {
        return $this->offlineSessionIdleTimeout;
    }

    /**
     * @param mixed $offlineSessionIdleTimeout
     * @return Realm
     */
    public function setOfflineSessionIdleTimeout($offlineSessionIdleTimeout)
    {
        $this->offlineSessionIdleTimeout = $offlineSessionIdleTimeout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOfflineSessionMaxLifespan()
    {
        return $this->offlineSessionMaxLifespan;
    }

    /**
     * @param mixed $offlineSessionMaxLifespan
     * @return Realm
     */
    public function setOfflineSessionMaxLifespan($offlineSessionMaxLifespan)
    {
        $this->offlineSessionMaxLifespan = $offlineSessionMaxLifespan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOfflineSessionMaxLifespanEnabled()
    {
        return $this->offlineSessionMaxLifespanEnabled;
    }

    /**
     * @param mixed $offlineSessionMaxLifespanEnabled
     * @return Realm
     */
    public function setOfflineSessionMaxLifespanEnabled($offlineSessionMaxLifespanEnabled)
    {
        $this->offlineSessionMaxLifespanEnabled = $offlineSessionMaxLifespanEnabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPolicyAlgorithm()
    {
        return $this->otpPolicyAlgorithm;
    }

    /**
     * @param mixed $otpPolicyAlgorithm
     * @return Realm
     */
    public function setOtpPolicyAlgorithm($otpPolicyAlgorithm)
    {
        $this->otpPolicyAlgorithm = $otpPolicyAlgorithm;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPolicyDigits()
    {
        return $this->otpPolicyDigits;
    }

    /**
     * @param mixed $otpPolicyDigits
     * @return Realm
     */
    public function setOtpPolicyDigits($otpPolicyDigits)
    {
        $this->otpPolicyDigits = $otpPolicyDigits;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPolicyInitialCounter()
    {
        return $this->otpPolicyInitialCounter;
    }

    /**
     * @param mixed $otpPolicyInitialCounter
     * @return Realm
     */
    public function setOtpPolicyInitialCounter($otpPolicyInitialCounter)
    {
        $this->otpPolicyInitialCounter = $otpPolicyInitialCounter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPolicyLookAheadWindow()
    {
        return $this->otpPolicyLookAheadWindow;
    }

    /**
     * @param mixed $otpPolicyLookAheadWindow
     * @return Realm
     */
    public function setOtpPolicyLookAheadWindow($otpPolicyLookAheadWindow)
    {
        $this->otpPolicyLookAheadWindow = $otpPolicyLookAheadWindow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPolicyPeriod()
    {
        return $this->otpPolicyPeriod;
    }

    /**
     * @param mixed $otpPolicyPeriod
     * @return Realm
     */
    public function setOtpPolicyPeriod($otpPolicyPeriod)
    {
        $this->otpPolicyPeriod = $otpPolicyPeriod;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPolicyType()
    {
        return $this->otpPolicyType;
    }

    /**
     * @param mixed $otpPolicyType
     * @return Realm
     */
    public function setOtpPolicyType($otpPolicyType)
    {
        $this->otpPolicyType = $otpPolicyType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpSupportedApplications()
    {
        return $this->otpSupportedApplications;
    }

    /**
     * @param mixed $otpSupportedApplications
     * @return Realm
     */
    public function setOtpSupportedApplications($otpSupportedApplications)
    {
        $this->otpSupportedApplications = $otpSupportedApplications;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswordPolicy()
    {
        return $this->passwordPolicy;
    }

    /**
     * @param mixed $passwordPolicy
     * @return Realm
     */
    public function setPasswordPolicy($passwordPolicy)
    {
        $this->passwordPolicy = $passwordPolicy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermanentLockout()
    {
        return $this->permanentLockout;
    }

    /**
     * @param mixed $permanentLockout
     * @return Realm
     */
    public function setPermanentLockout($permanentLockout)
    {
        $this->permanentLockout = $permanentLockout;
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
     * @return Realm
     */
    public function setProtocolMappers($protocolMappers)
    {
        $this->protocolMappers = $protocolMappers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuickLoginCheckMilliSeconds()
    {
        return $this->quickLoginCheckMilliSeconds;
    }

    /**
     * @param mixed $quickLoginCheckMilliSeconds
     * @return Realm
     */
    public function setQuickLoginCheckMilliSeconds($quickLoginCheckMilliSeconds)
    {
        $this->quickLoginCheckMilliSeconds = $quickLoginCheckMilliSeconds;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * @param mixed $realm
     * @return Realm
     */
    public function setRealm($realm)
    {
        $this->realm = $realm;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefreshTokenMaxReuse()
    {
        return $this->refreshTokenMaxReuse;
    }

    /**
     * @param mixed $refreshTokenMaxReuse
     * @return Realm
     */
    public function setRefreshTokenMaxReuse($refreshTokenMaxReuse)
    {
        $this->refreshTokenMaxReuse = $refreshTokenMaxReuse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrationAllowed()
    {
        return $this->registrationAllowed;
    }

    /**
     * @param mixed $registrationAllowed
     * @return Realm
     */
    public function setRegistrationAllowed($registrationAllowed)
    {
        $this->registrationAllowed = $registrationAllowed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrationEmailAsUsername()
    {
        return $this->registrationEmailAsUsername;
    }

    /**
     * @param mixed $registrationEmailAsUsername
     * @return Realm
     */
    public function setRegistrationEmailAsUsername($registrationEmailAsUsername)
    {
        $this->registrationEmailAsUsername = $registrationEmailAsUsername;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrationFlow()
    {
        return $this->registrationFlow;
    }

    /**
     * @param mixed $registrationFlow
     * @return Realm
     */
    public function setRegistrationFlow($registrationFlow)
    {
        $this->registrationFlow = $registrationFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRememberMe()
    {
        return $this->rememberMe;
    }

    /**
     * @param mixed $rememberMe
     * @return Realm
     */
    public function setRememberMe($rememberMe)
    {
        $this->rememberMe = $rememberMe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequiredActions()
    {
        return $this->requiredActions;
    }

    /**
     * @param mixed $requiredActions
     * @return Realm
     */
    public function setRequiredActions($requiredActions)
    {
        $this->requiredActions = $requiredActions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResetCredentialsFlow()
    {
        return $this->resetCredentialsFlow;
    }

    /**
     * @param mixed $resetCredentialsFlow
     * @return Realm
     */
    public function setResetCredentialsFlow($resetCredentialsFlow)
    {
        $this->resetCredentialsFlow = $resetCredentialsFlow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResetPasswordAllowed()
    {
        return $this->resetPasswordAllowed;
    }

    /**
     * @param mixed $resetPasswordAllowed
     * @return Realm
     */
    public function setResetPasswordAllowed($resetPasswordAllowed)
    {
        $this->resetPasswordAllowed = $resetPasswordAllowed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRevokeRefreshToken()
    {
        return $this->revokeRefreshToken;
    }

    /**
     * @param mixed $revokeRefreshToken
     * @return Realm
     */
    public function setRevokeRefreshToken($revokeRefreshToken)
    {
        $this->revokeRefreshToken = $revokeRefreshToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     * @return Realm
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScopeMappings()
    {
        return $this->scopeMappings;
    }

    /**
     * @param mixed $scopeMappings
     * @return Realm
     */
    public function setScopeMappings($scopeMappings)
    {
        $this->scopeMappings = $scopeMappings;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSmtpServer()
    {
        return $this->smtpServer;
    }

    /**
     * @param mixed $smtpServer
     * @return Realm
     */
    public function setSmtpServer($smtpServer)
    {
        $this->smtpServer = $smtpServer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSslRequired()
    {
        return $this->sslRequired;
    }

    /**
     * @param mixed $sslRequired
     * @return Realm
     */
    public function setSslRequired($sslRequired)
    {
        $this->sslRequired = $sslRequired;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSsoSessionIdleTimeout()
    {
        return $this->ssoSessionIdleTimeout;
    }

    /**
     * @param mixed $ssoSessionIdleTimeout
     * @return Realm
     */
    public function setSsoSessionIdleTimeout($ssoSessionIdleTimeout)
    {
        $this->ssoSessionIdleTimeout = $ssoSessionIdleTimeout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSsoSessionIdleTimeoutRememberMe()
    {
        return $this->ssoSessionIdleTimeoutRememberMe;
    }

    /**
     * @param mixed $ssoSessionIdleTimeoutRememberMe
     * @return Realm
     */
    public function setSsoSessionIdleTimeoutRememberMe($ssoSessionIdleTimeoutRememberMe)
    {
        $this->ssoSessionIdleTimeoutRememberMe = $ssoSessionIdleTimeoutRememberMe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSsoSessionMaxLifespan()
    {
        return $this->ssoSessionMaxLifespan;
    }

    /**
     * @param mixed $ssoSessionMaxLifespan
     * @return Realm
     */
    public function setSsoSessionMaxLifespan($ssoSessionMaxLifespan)
    {
        $this->ssoSessionMaxLifespan = $ssoSessionMaxLifespan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSsoSessionMaxLifespanRememberMe()
    {
        return $this->ssoSessionMaxLifespanRememberMe;
    }

    /**
     * @param mixed $ssoSessionMaxLifespanRememberMe
     * @return Realm
     */
    public function setSsoSessionMaxLifespanRememberMe($ssoSessionMaxLifespanRememberMe)
    {
        $this->ssoSessionMaxLifespanRememberMe = $ssoSessionMaxLifespanRememberMe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupportedLocales()
    {
        return $this->supportedLocales;
    }

    /**
     * @param mixed $supportedLocales
     * @return Realm
     */
    public function setSupportedLocales($supportedLocales)
    {
        $this->supportedLocales = $supportedLocales;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserFederationMappers()
    {
        return $this->userFederationMappers;
    }

    /**
     * @param mixed $userFederationMappers
     * @return Realm
     */
    public function setUserFederationMappers($userFederationMappers)
    {
        $this->userFederationMappers = $userFederationMappers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserFederationProviders()
    {
        return $this->userFederationProviders;
    }

    /**
     * @param mixed $userFederationProviders
     * @return Realm
     */
    public function setUserFederationProviders($userFederationProviders)
    {
        $this->userFederationProviders = $userFederationProviders;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserManagedAccessAllowed()
    {
        return $this->userManagedAccessAllowed;
    }

    /**
     * @param mixed $userManagedAccessAllowed
     * @return Realm
     */
    public function setUserManagedAccessAllowed($userManagedAccessAllowed)
    {
        $this->userManagedAccessAllowed = $userManagedAccessAllowed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     * @return Realm
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerifyEmail()
    {
        return $this->verifyEmail;
    }

    /**
     * @param mixed $verifyEmail
     * @return Realm
     */
    public function setVerifyEmail($verifyEmail)
    {
        $this->verifyEmail = $verifyEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWaitIncrementSeconds()
    {
        return $this->waitIncrementSeconds;
    }

    /**
     * @param mixed $waitIncrementSeconds
     * @return Realm
     */
    public function setWaitIncrementSeconds($waitIncrementSeconds)
    {
        $this->waitIncrementSeconds = $waitIncrementSeconds;
        return $this;
    }
}
