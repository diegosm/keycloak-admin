<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Realm implements \JsonSerializable
{
    /**
     * @Type("string")
     */
    private $id;

    /**
     * @Type("string")
     */
    private $realm;

    /**
     * @Type("integer")
     * @SerializedName("notBefore")
     */
    private $notBefore;

    /**
     * @Type("boolean")
     * @SerializedName("revokeRefreshToken")
     */
    private $revokeRefreshToken;

    /**
     * @Type("integer")
     * @SerializedName("revokeRefreshToken")
     */
    private $refreshTokenMaxReuse;

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
     * @Type("integer")
     * @SerializedName("ssoSessionIdleTimeout")
     */
    private $ssoSessionIdleTimeout;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionMaxLifespan")
     */
    private $ssoSessionMaxLifespan;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionIdleTimeoutRememberMe")
     */
    private $ssoSessionIdleTimeoutRememberMe;

    /**
     * @Type("integer")
     * @SerializedName("ssoSessionMaxLifespanRememberMe")
     */
    private $ssoSessionMaxLifespanRememberMe;

    /**
     * @Type("integer")
     * @SerializedName("offlineSessionIdleTimeout")
     */
    private $offlineSessionIdleTimeout;

    /**
     * @Type("boolean")
     * @SerializedName("offlineSessionMaxLifespanEnabled")
     */
    private $offlineSessionMaxLifespanEnabled;

    /**
     * @Type("integer")
     * @SerializedName("offlineSessionMaxLifespan")
     */
    private $offlineSessionMaxLifespan;

    /**
     * @Type("integer")
     * @SerializedName("accessCodeLifespan")
     */
    private $accessCodeLifespan;

    /**
     * @Type("integer")
     * @SerializedName("accessCodeLifespanUserAction")
     */
    private $accessCodeLifespanUserAction;

    /**
     * @Type("integer")
     * @SerializedName("accessCodeLifespanLogin")
     */
    private $accessCodeLifespanLogin;

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
     */
    private $enabled;

    /**
     * @Type("string")
     * @SerializedName("sslRequired")
     */
    private $sslRequired;

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
     * @Type("boolean")
     * @SerializedName("rememberMe")
     */
    private $rememberMe;

    /**
     * @Type("boolean")
     * @SerializedName("verifyEmail")
     */
    private $verifyEmail;

    /**
     * @Type("boolean")
     * @SerializedName("loginWithEmailAllowed")
     */
    private $loginWithEmailAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("duplicateEmailsAllowed")
     */
    private $duplicateEmailsAllowed;
    /**
     * @Type("boolean")
     * @SerializedName("resetPasswordAllowed")
     */
    private $resetPasswordAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("editUsernameAllowed")
     */
    private $editUsernameAllowed;

    /**
     * @Type("boolean")
     * @SerializedName("bruteForceProtected")
     */
    private $bruteForceProtected;

    /**
     * @Type("boolean")
     * @SerializedName("permanentLockout")
     */
    private $permanentLockout;

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
     * @SerializedName("waitIncrementSeconds")
     */
    private $waitIncrementSeconds;

    /**
     * @Type("integer")
     * @SerializedName("quickLoginCheckMilliSeconds")
     */
    private $quickLoginCheckMilliSeconds;

    /**
     * @Type("integer")
     * @SerializedName("maxDeltaTimeSeconds")
     */
    private $maxDeltaTimeSeconds;

    /**
     * @Type("integer")
     * @SerializedName("failureFactor")
     */
    private $failureFactor;

    /**
     * @Type("array")
     * @SerializedName("defaultRoles")
     */
    private $defaultRoles;

    /**
     * @Type("array")
     * @SerializedName("requiredCredentials")
     */
    private $requiredCredentials;

    /**
     * @Type("string")
     * @SerializedName("otpPolicyType")
     */
    private $otpPolicyType;

    /**
     * @Type("string")
     * @SerializedName("otpPolicyAlgorithm")
     */
    private $otpPolicyAlgorithm;

    /**
     * @Type("integer")
     * @SerializedName("otpPolicyInitialCounter")
     */
    private $otpPolicyInitialCounter;

    /**
     * @Type("integer")
     * @SerializedName("otpPolicyDigits")
     */
    private $otpPolicyDigits;

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
     * @Type("array")
     * @SerializedName("otpSupportedApplications")
     */
    private $otpSupportedApplications;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyRpEntityName")
     */
    private $webAuthnPolicyRpEntityName;

    /**
     * @Type("array")
     * @SerializedName("webAuthnPolicySignatureAlgorithms")
     */
    private $webAuthnPolicySignatureAlgorithms;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyRpId")
     */
    private $webAuthnPolicyRpId;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyAttestationConveyancePreference")
     */
    private $webAuthnPolicyAttestationConveyancePreference;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyAuthenticatorAttachment")
     */
    private $webAuthnPolicyAuthenticatorAttachment;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyRequireResidentKey")
     */
    private $webAuthnPolicyRequireResidentKey;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyUserVerificationRequirement")
     */
    private $webAuthnPolicyUserVerificationRequirement;

    /**
     * @Type("integer")
     * @SerializedName("webAuthnPolicyCreateTimeout")
     */
    private $webAuthnPolicyCreateTimeout;

    /**
     * @Type("boolean")
     * @SerializedName("webAuthnPolicyAvoidSameAuthenticatorRegister")
     */
    private $webAuthnPolicyAvoidSameAuthenticatorRegister;

    /**
     * @Type("array")
     * @SerializedName("webAuthnPolicyAcceptableAaguids")
     */
    private $webAuthnPolicyAcceptableAaguids;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyPasswordlessRpEntityName")
     */
    private $webAuthnPolicyPasswordlessRpEntityName;

    /**
     * @Type("array")
     * @SerializedName("webAuthnPolicyPasswordlessSignatureAlgorithms")
     */
    private $webAuthnPolicyPasswordlessSignatureAlgorithms;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyPasswordlessRpId")
     */
    private $webAuthnPolicyPasswordlessRpId;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyPasswordlessAttestationConveyancePreference")
     */
    private $webAuthnPolicyPasswordlessAttestationConveyancePreference;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyPasswordlessAuthenticatorAttachment")
     */
    private $webAuthnPolicyPasswordlessAuthenticatorAttachment;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyPasswordlessRequireResidentKey")
     */
    private $webAuthnPolicyPasswordlessRequireResidentKey;

    /**
     * @Type("string")
     * @SerializedName("webAuthnPolicyPasswordlessUserVerificationRequirement")
     */
    private $webAuthnPolicyPasswordlessUserVerificationRequirement;

    /**
     * @Type("integer")
     * @SerializedName("webAuthnPolicyPasswordlessCreateTimeout")
     */
    private $webAuthnPolicyPasswordlessCreateTimeout;

    /**
     * @Type("boolean")
     * @SerializedName("webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister")
     */
    private $webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister;

    /**
     * @Type("array")
     * @SerializedName("webAuthnPolicyPasswordlessAcceptableAaguids")
     */
    private $webAuthnPolicyPasswordlessAcceptableAaguids;

    /**
     * @Type("array")
     * @SerializedName("browserSecurityHeaders")
     */
    private $browserSecurityHeaders;

    /**
     * @Type("array")
     * @SerializedName("smtpServer")
     */
    private $smtpServer;

    /**
     * @Type("boolean")
     * @SerializedName("eventsEnabled")
     */
    private $eventsEnabled;

    /**
     * @Type("array")
     * @SerializedName("eventsListeners")
     */
    private $eventsListeners;

    /**
     * @Type("array")
     * @SerializedName("enabledEventTypes")
     */
    private $enabledEventTypes;

    /**
     * @Type("boolean")
     * @SerializedName("adminEventsEnabled")
     */
    private $adminEventsEnabled;

    /**
     * @Type("boolean")
     * @SerializedName("adminEventsDetailsEnabled")
     */
    private $adminEventsDetailsEnabled;

    /**
     * @Type("array<KeycloakAdmin\IdentityProviders\IdentityProvider>")
     * @SerializedName("identityProviders")
     */
    private $identityProviders;

    /**
     * @Type("boolean")
     * @SerializedName("internationalizationEnabled")
     */
    private $internationalizationEnabled;

    /**
     * @Type("array")
     * @SerializedName("supportedLocales")
     */
    private $supportedLocales;

    /**
     * @Type("string")
     * @SerializedName("browserFlow")
     */
    private $browserFlow;

    /**
     * @Type("string")
     * @SerializedName("registrationFlow")
     */
    private $registrationFlow;

    /**
     * @Type("string")
     * @SerializedName("directGrantFlow")
     */
    private $directGrantFlow;

    /**
     * @Type("string")
     * @SerializedName("resetCredentialsFlow")
     */
    private $resetCredentialsFlow;

    /**
     * @Type("string")
     * @SerializedName("clientAuthenticationFlow")
     */
    private $clientAuthenticationFlow;

    /**
     * @Type("string")
     * @SerializedName("dockerAuthenticationFlow")
     */
    private $dockerAuthenticationFlow;

    /**
     * @Type("array")
     * @SerializedName("attributes")
     */
    private $attributes;

    /**
     * @Type("boolean")
     * @SerializedName("userManagedAccessAllowed")
     */
    private $userManagedAccessAllowed;

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
    public function getRequiredCredentials()
    {
        return $this->requiredCredentials;
    }

    /**
     * @param mixed $requiredCredentials
     * @return Realm
     */
    public function setRequiredCredentials($requiredCredentials)
    {
        $this->requiredCredentials = $requiredCredentials;
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
    public function getWebAuthnPolicyRpEntityName()
    {
        return $this->webAuthnPolicyRpEntityName;
    }

    /**
     * @param mixed $webAuthnPolicyRpEntityName
     * @return Realm
     */
    public function setWebAuthnPolicyRpEntityName($webAuthnPolicyRpEntityName)
    {
        $this->webAuthnPolicyRpEntityName = $webAuthnPolicyRpEntityName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicySignatureAlgorithms()
    {
        return $this->webAuthnPolicySignatureAlgorithms;
    }

    /**
     * @param mixed $webAuthnPolicySignatureAlgorithms
     * @return Realm
     */
    public function setWebAuthnPolicySignatureAlgorithms($webAuthnPolicySignatureAlgorithms)
    {
        $this->webAuthnPolicySignatureAlgorithms = $webAuthnPolicySignatureAlgorithms;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyRpId()
    {
        return $this->webAuthnPolicyRpId;
    }

    /**
     * @param mixed $webAuthnPolicyRpId
     * @return Realm
     */
    public function setWebAuthnPolicyRpId($webAuthnPolicyRpId)
    {
        $this->webAuthnPolicyRpId = $webAuthnPolicyRpId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyAttestationConveyancePreference()
    {
        return $this->webAuthnPolicyAttestationConveyancePreference;
    }

    /**
     * @param mixed $webAuthnPolicyAttestationConveyancePreference
     * @return Realm
     */
    public function setWebAuthnPolicyAttestationConveyancePreference($webAuthnPolicyAttestationConveyancePreference)
    {
        $this->webAuthnPolicyAttestationConveyancePreference = $webAuthnPolicyAttestationConveyancePreference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyAuthenticatorAttachment()
    {
        return $this->webAuthnPolicyAuthenticatorAttachment;
    }

    /**
     * @param mixed $webAuthnPolicyAuthenticatorAttachment
     * @return Realm
     */
    public function setWebAuthnPolicyAuthenticatorAttachment($webAuthnPolicyAuthenticatorAttachment)
    {
        $this->webAuthnPolicyAuthenticatorAttachment = $webAuthnPolicyAuthenticatorAttachment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyRequireResidentKey()
    {
        return $this->webAuthnPolicyRequireResidentKey;
    }

    /**
     * @param mixed $webAuthnPolicyRequireResidentKey
     * @return Realm
     */
    public function setWebAuthnPolicyRequireResidentKey($webAuthnPolicyRequireResidentKey)
    {
        $this->webAuthnPolicyRequireResidentKey = $webAuthnPolicyRequireResidentKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyUserVerificationRequirement()
    {
        return $this->webAuthnPolicyUserVerificationRequirement;
    }

    /**
     * @param mixed $webAuthnPolicyUserVerificationRequirement
     * @return Realm
     */
    public function setWebAuthnPolicyUserVerificationRequirement($webAuthnPolicyUserVerificationRequirement)
    {
        $this->webAuthnPolicyUserVerificationRequirement = $webAuthnPolicyUserVerificationRequirement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyCreateTimeout()
    {
        return $this->webAuthnPolicyCreateTimeout;
    }

    /**
     * @param mixed $webAuthnPolicyCreateTimeout
     * @return Realm
     */
    public function setWebAuthnPolicyCreateTimeout($webAuthnPolicyCreateTimeout)
    {
        $this->webAuthnPolicyCreateTimeout = $webAuthnPolicyCreateTimeout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyAvoidSameAuthenticatorRegister()
    {
        return $this->webAuthnPolicyAvoidSameAuthenticatorRegister;
    }

    /**
     * @param mixed $webAuthnPolicyAvoidSameAuthenticatorRegister
     * @return Realm
     */
    public function setWebAuthnPolicyAvoidSameAuthenticatorRegister($webAuthnPolicyAvoidSameAuthenticatorRegister)
    {
        $this->webAuthnPolicyAvoidSameAuthenticatorRegister = $webAuthnPolicyAvoidSameAuthenticatorRegister;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyAcceptableAaguids()
    {
        return $this->webAuthnPolicyAcceptableAaguids;
    }

    /**
     * @param mixed $webAuthnPolicyAcceptableAaguids
     * @return Realm
     */
    public function setWebAuthnPolicyAcceptableAaguids($webAuthnPolicyAcceptableAaguids)
    {
        $this->webAuthnPolicyAcceptableAaguids = $webAuthnPolicyAcceptableAaguids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessRpEntityName()
    {
        return $this->webAuthnPolicyPasswordlessRpEntityName;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessRpEntityName
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessRpEntityName($webAuthnPolicyPasswordlessRpEntityName)
    {
        $this->webAuthnPolicyPasswordlessRpEntityName = $webAuthnPolicyPasswordlessRpEntityName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessSignatureAlgorithms()
    {
        return $this->webAuthnPolicyPasswordlessSignatureAlgorithms;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessSignatureAlgorithms
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessSignatureAlgorithms($webAuthnPolicyPasswordlessSignatureAlgorithms)
    {
        $this->webAuthnPolicyPasswordlessSignatureAlgorithms = $webAuthnPolicyPasswordlessSignatureAlgorithms;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessRpId()
    {
        return $this->webAuthnPolicyPasswordlessRpId;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessRpId
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessRpId($webAuthnPolicyPasswordlessRpId)
    {
        $this->webAuthnPolicyPasswordlessRpId = $webAuthnPolicyPasswordlessRpId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessAttestationConveyancePreference()
    {
        return $this->webAuthnPolicyPasswordlessAttestationConveyancePreference;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessAttestationConveyancePreference
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessAttestationConveyancePreference($webAuthnPolicyPasswordlessAttestationConveyancePreference)
    {
        $this->webAuthnPolicyPasswordlessAttestationConveyancePreference = $webAuthnPolicyPasswordlessAttestationConveyancePreference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessAuthenticatorAttachment()
    {
        return $this->webAuthnPolicyPasswordlessAuthenticatorAttachment;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessAuthenticatorAttachment
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessAuthenticatorAttachment($webAuthnPolicyPasswordlessAuthenticatorAttachment)
    {
        $this->webAuthnPolicyPasswordlessAuthenticatorAttachment = $webAuthnPolicyPasswordlessAuthenticatorAttachment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessRequireResidentKey()
    {
        return $this->webAuthnPolicyPasswordlessRequireResidentKey;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessRequireResidentKey
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessRequireResidentKey($webAuthnPolicyPasswordlessRequireResidentKey)
    {
        $this->webAuthnPolicyPasswordlessRequireResidentKey = $webAuthnPolicyPasswordlessRequireResidentKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessUserVerificationRequirement()
    {
        return $this->webAuthnPolicyPasswordlessUserVerificationRequirement;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessUserVerificationRequirement
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessUserVerificationRequirement($webAuthnPolicyPasswordlessUserVerificationRequirement)
    {
        $this->webAuthnPolicyPasswordlessUserVerificationRequirement = $webAuthnPolicyPasswordlessUserVerificationRequirement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessCreateTimeout()
    {
        return $this->webAuthnPolicyPasswordlessCreateTimeout;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessCreateTimeout
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessCreateTimeout($webAuthnPolicyPasswordlessCreateTimeout)
    {
        $this->webAuthnPolicyPasswordlessCreateTimeout = $webAuthnPolicyPasswordlessCreateTimeout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister()
    {
        return $this->webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister($webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister)
    {
        $this->webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister = $webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebAuthnPolicyPasswordlessAcceptableAaguids()
    {
        return $this->webAuthnPolicyPasswordlessAcceptableAaguids;
    }

    /**
     * @param mixed $webAuthnPolicyPasswordlessAcceptableAaguids
     * @return Realm
     */
    public function setWebAuthnPolicyPasswordlessAcceptableAaguids($webAuthnPolicyPasswordlessAcceptableAaguids)
    {
        $this->webAuthnPolicyPasswordlessAcceptableAaguids = $webAuthnPolicyPasswordlessAcceptableAaguids;
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

    public function toArray()
    {
        return array_filter(get_object_vars($this), function ($item) {
            return null !== $item;
        });
    }

    public function jsonSerialize()
    {
        return json_encode(array_filter(get_object_vars($this), function ($item) {
            return null !== $item;
        }));
    }
}