<?php

require "../vendor/autoload.php";

$admin = \KeycloakAdmin\Factories\KeycloakAdminFactory::create(
    'manager-cli',
    '3a258032-69f9-402c-b1eb-706f700d652d',
    'http://keycloak:8080/auth'
);

//$json = '{"realm": "diego6" }';
//$result = $admin->realm()->createFromJson($json)->save();
//var_dump('SAVE OK');

//var_dump($result->getRealm());

$json = '{"realm": "diego6", "notBefore": 100200, "enabled": true }';

$result = $admin->realm()->createFromJson($json)->update();
//$result = $admin->realm()->show($result->getRealm());

var_dump($result->getRealm(), $result->getNotBefore());

exit;











use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader('class_exists');


$serializer = JMS\Serializer\SerializerBuilder::create()->build();

echo "\n\n\n\n";

$data = '
{
    "id": "47307f2e-8af4-4605-b27a-e2f5eb4722c7",
    "realm": "diego",
    "notBefore": 1000,
    "revokeRefreshToken": false,
    "refreshTokenMaxReuse": 0,
    "accessTokenLifespan": 300,
    "accessTokenLifespanForImplicitFlow": 900,
    "ssoSessionIdleTimeout": 1800,
    "ssoSessionMaxLifespan": 36000,
    "ssoSessionIdleTimeoutRememberMe": 0,
    "ssoSessionMaxLifespanRememberMe": 0,
    "offlineSessionIdleTimeout": 2592000,
    "offlineSessionMaxLifespanEnabled": false,
    "offlineSessionMaxLifespan": 5184000,
    "accessCodeLifespan": 60,
    "accessCodeLifespanUserAction": 300,
    "accessCodeLifespanLogin": 1800,
    "actionTokenGeneratedByAdminLifespan": 43200,
    "actionTokenGeneratedByUserLifespan": 300,
    "enabled": false,
    "sslRequired": "external",
    "registrationAllowed": false,
    "registrationEmailAsUsername": false,
    "rememberMe": false,
    "verifyEmail": false,
    "loginWithEmailAllowed": true,
    "duplicateEmailsAllowed": false,
    "resetPasswordAllowed": false,
    "editUsernameAllowed": false,
    "bruteForceProtected": false,
    "permanentLockout": false,
    "maxFailureWaitSeconds": 900,
    "minimumQuickLoginWaitSeconds": 60,
    "waitIncrementSeconds": 60,
    "quickLoginCheckMilliSeconds": 1000,
    "maxDeltaTimeSeconds": 43200,
    "failureFactor": 30,
    "defaultRoles": [
        "uma_authorization",
        "offline_access"
    ],
    "requiredCredentials": [
        "password"
    ],
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
        "contentSecurityPolicy": "frame-src \'self\'; frame-ancestors \'self\'; object-src \'none\';",
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
        "_browser_header.contentSecurityPolicy": "frame-src \'self\'; frame-ancestors \'self\'; object-src \'none\';",
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
}
';

$object = $serializer->deserialize($data, \KeycloakAdmin\Clients\Client::class, 'json');

var_dump($object);

echo "\n\n\n\n";