<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Realm
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

    /*

"otpPolicyType": "totp",
"otpPolicyAlgorithm": "HmacSHA1",
"otpPolicyInitialCounter": 0,
"otpPolicyDigits": 6,
"otpPolicyLookAheadWindow": 1,
"otpPolicyPeriod": 30,
"otpSupportedApplications": [
"FreeOTP",
"Google Authenticator"
],
"webAuthnPolicyRpEntityName": "keycloak",
"webAuthnPolicySignatureAlgorithms": [
"ES256"
],
"webAuthnPolicyRpId": "",
"webAuthnPolicyAttestationConveyancePreference": "not specified",
"webAuthnPolicyAuthenticatorAttachment": "not specified",
"webAuthnPolicyRequireResidentKey": "not specified",
"webAuthnPolicyUserVerificationRequirement": "not specified",
"webAuthnPolicyCreateTimeout": 0,
"webAuthnPolicyAvoidSameAuthenticatorRegister": false,
"webAuthnPolicyAcceptableAaguids": [],
"webAuthnPolicyPasswordlessRpEntityName": "keycloak",
"webAuthnPolicyPasswordlessSignatureAlgorithms": [
"ES256"
],
"webAuthnPolicyPasswordlessRpId": "",
"webAuthnPolicyPasswordlessAttestationConveyancePreference": "not specified",
"webAuthnPolicyPasswordlessAuthenticatorAttachment": "not specified",
"webAuthnPolicyPasswordlessRequireResidentKey": "not specified",
"webAuthnPolicyPasswordlessUserVerificationRequirement": "not specified",
"webAuthnPolicyPasswordlessCreateTimeout": 0,
"webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister": false,
"webAuthnPolicyPasswordlessAcceptableAaguids": [],
"browserSecurityHeaders": {
"contentSecurityPolicyReportOnly": "",
"xContentTypeOptions": "nosniff",
"xRobotsTag": "none",
"xFrameOptions": "SAMEORIGIN",
"contentSecurityPolicy": "frame-src 'self'; frame-ancestors 'self'; object-src 'none';",
"xXSSProtection": "1; mode=block",
"strictTransportSecurity": "max-age=31536000; includeSubDomains"
},
"smtpServer": {},
        "eventsEnabled": false,
        "eventsListeners": [
    "jboss-logging"
],
        "enabledEventTypes": [],
        "adminEventsEnabled": false,
        "adminEventsDetailsEnabled": false,
        "identityProviders": [
            {
                "alias": "github",
                "internalId": "77f6a62b-1259-43b5-a572-93bf426f025f",
                "providerId": "github",
                "enabled": true,
                "updateProfileFirstLoginMode": "on",
                "trustEmail": false,
                "storeToken": false,
                "addReadTokenRoleOnCreate": false,
                "authenticateByDefault": false,
                "linkOnly": false,
                "firstBrokerLoginFlowAlias": "first broker login",
                "config": {
                "hideOnLoginPage": "",
                    "acceptsPromptNoneForwardFromClient": "",
                    "clientId": "-0h130h30h",
                    "disableUserInfo": "",
                    "clientSecret": "aiepapeihpaeithea",
                    "useJwksUrl": "true"
                }
            },
            {
                "alias": "facebook",
                "internalId": "89893a35-3294-4385-998a-6215a2169fae",
                "providerId": "facebook",
                "enabled": true,
                "updateProfileFirstLoginMode": "on",
                "trustEmail": false,
                "storeToken": false,
                "addReadTokenRoleOnCreate": false,
                "authenticateByDefault": false,
                "linkOnly": false,
                "firstBrokerLoginFlowAlias": "first broker login",
                "config": {
                "hideOnLoginPage": "",
                    "acceptsPromptNoneForwardFromClient": "",
                    "clientId": "00awnt0aein",
                    "disableUserInfo": "",
                    "clientSecret": "9aet0aet0aeht0aetheat",
                    "useJwksUrl": "true"
                }
            }
        ],
        "internationalizationEnabled": false,
        "supportedLocales": [],
        "browserFlow": "browser",
        "registrationFlow": "registration",
        "directGrantFlow": "direct grant",
        "resetCredentialsFlow": "reset credentials",
        "clientAuthenticationFlow": "clients",
        "dockerAuthenticationFlow": "docker auth",
        "attributes": {
    "webAuthnPolicyAuthenticatorAttachment": "not specified",
            "webAuthnPolicyAttestationConveyancePreferencePasswordless": "not specified",
            "webAuthnPolicyRequireResidentKeyPasswordless": "not specified",
            "_browser_header.xRobotsTag": "none",
            "webAuthnPolicySignatureAlgorithmsPasswordless": "ES256",
            "webAuthnPolicyRpEntityName": "keycloak",
            "webAuthnPolicyAvoidSameAuthenticatorRegisterPasswordless": "false",
            "failureFactor": "30",
            "webAuthnPolicyAuthenticatorAttachmentPasswordless": "not specified",
            "actionTokenGeneratedByUserLifespan": "300",
            "maxDeltaTimeSeconds": "43200",
            "webAuthnPolicySignatureAlgorithms": "ES256",
            "webAuthnPolicyRpEntityNamePasswordless": "keycloak",
            "offlineSessionMaxLifespan": "5184000",
            "_browser_header.contentSecurityPolicyReportOnly": "",
            "bruteForceProtected": "false",
            "webAuthnPolicyRpIdPasswordless": "",
            "_browser_header.contentSecurityPolicy": "frame-src 'self'; frame-ancestors 'self'; object-src 'none';",
            "_browser_header.xXSSProtection": "1; mode=block",
            "webAuthnPolicyUserVerificationRequirement": "not specified",
            "_browser_header.strictTransportSecurity": "max-age=31536000; includeSubDomains",
            "_browser_header.xFrameOptions": "SAMEORIGIN",
            "permanentLockout": "false",
            "quickLoginCheckMilliSeconds": "1000",
            "webAuthnPolicyCreateTimeout": "0",
            "webAuthnPolicyRequireResidentKey": "not specified",
            "webAuthnPolicyAttestationConveyancePreference": "not specified",
            "webAuthnPolicyRpId": "",
            "maxFailureWaitSeconds": "900",
            "minimumQuickLoginWaitSeconds": "60",
            "webAuthnPolicyCreateTimeoutPasswordless": "0",
            "webAuthnPolicyAvoidSameAuthenticatorRegister": "false",
            "webAuthnPolicyUserVerificationRequirementPasswordless": "not specified",
            "_browser_header.xContentTypeOptions": "nosniff",
            "actionTokenGeneratedByAdminLifespan": "43200",
            "offlineSessionMaxLifespanEnabled": "false",
            "waitIncrementSeconds": "60"
        },
        "userManagedAccessAllowed": false
    },*/
}