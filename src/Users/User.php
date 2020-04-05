<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use KeycloakAdmin\Traits\ArrayableTrait;
use KeycloakAdmin\Traits\JsonableTrait;

class User implements \JsonSerializable
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
     * @Type("array")
     */
    private $attributes;

    /**
     * @Type("array<KeycloackAdmin\Users\UserConsentRepresentation>")
     * @SerializedName("clientConsents")
     */
    private $clientConsents;

    /**
     * @Type("array")
     * @SerializedName("clientRoles")
     */
    private $clientRoles;

    /**
     * @Type("integer")
     * @SerializedName("createdTimestamp")
     */
    private $createdTimestamp;

    /**
     * @Type("array<KeycloackAdmin\Users\CredentialRepresentation>")
     */
    private $credentials;

    /**
     * @Type("array")
     * @SerializedName("disableableCredentialTypes")
     */
    private $disableableCredentialTypes;

    /**
     * @Type("string")
     */
    private $email;

    /**
     * @Type("boolean")
     * @SerializedName("emailVerified")
     */
    private $emailVerified;

    /**
     * @Type("boolean")
     */
    private $enabled;

    /**
     * @Type("array")
     * @SerializedName("federatedIdentities")
     */
    private $federatedIdentities;

    /**
     * @Type("string")
     * @SerializedName("federationLink")
     */
    private $federationLink;

    /**
     * @Type("string")
     * @SerializedName("firstName")
     */
    private $firstName;

    /**
     * @Type("array")
     */
    private $groups;

    /**
     * @Type("string")
     * @SerializedName("lastName")
     */
    private $lastName;

    /**
     * @Type("integer")
     * @SerializedName("notBefore")
     */
    private $notBefore;

    /**
     * @Type("string")
     */
    private $origin;

    /**
     * @Type("array")
     * @SerializedName("realmRoles")
     */
    private $realmRoles;

    /**
     * @Type("array")
     * @SerializedName("requiredActions")
     */
    private $requiredActions;

    /**
     * @Type("string")
     */
    private $self;

    /**
     * @Type("string")
     * @SerializedName("serviceAccountClientId")
     */
    private $serviceAccountClientId;

    /**
     * @Type("string")
     */
    private $username;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
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
     * @return User
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getAttributes(string $key = '')
    {
        if (empty($key)) {
            return $this->attributes;
        }

        return $this->attributes[$key] ?? null;
    }

    /**
     * @param mixed $attributes
     * @return User
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientConsents()
    {
        return $this->clientConsents;
    }

    /**
     * @param mixed $clientConsents
     * @return User
     */
    public function setClientConsents($clientConsents)
    {
        $this->clientConsents = $clientConsents;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientRoles()
    {
        return $this->clientRoles;
    }

    /**
     * @param mixed $clientRoles
     * @return User
     */
    public function setClientRoles($clientRoles)
    {
        $this->clientRoles = $clientRoles;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * @param mixed $createdTimestamp
     * @return User
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param mixed $credentials
     * @return User
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisableableCredentialTypes()
    {
        return $this->disableableCredentialTypes;
    }

    /**
     * @param mixed $disableableCredentialTypes
     * @return User
     */
    public function setDisableableCredentialTypes($disableableCredentialTypes)
    {
        $this->disableableCredentialTypes = $disableableCredentialTypes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * @param mixed $emailVerified
     * @return User
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;
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
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFederatedIdentities()
    {
        return $this->federatedIdentities;
    }

    /**
     * @param mixed $federatedIdentities
     * @return User
     */
    public function setFederatedIdentities($federatedIdentities)
    {
        $this->federatedIdentities = $federatedIdentities;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFederationLink()
    {
        return $this->federationLink;
    }

    /**
     * @param mixed $federationLink
     * @return User
     */
    public function setFederationLink($federationLink)
    {
        $this->federationLink = $federationLink;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
     * @return User
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
     * @return User
     */
    public function setNotBefore($notBefore)
    {
        $this->notBefore = $notBefore;
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
     * @return User
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealmRoles()
    {
        return $this->realmRoles;
    }

    /**
     * @param mixed $realmRoles
     * @return User
     */
    public function setRealmRoles($realmRoles)
    {
        $this->realmRoles = $realmRoles;
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
     * @return User
     */
    public function setRequiredActions($requiredActions)
    {
        $this->requiredActions = $requiredActions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param mixed $self
     * @return User
     */
    public function setSelf($self)
    {
        $this->self = $self;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceAccountClientId()
    {
        return $this->serviceAccountClientId;
    }

    /**
     * @param mixed $serviceAccountClientId
     * @return User
     */
    public function setServiceAccountClientId($serviceAccountClientId)
    {
        $this->serviceAccountClientId = $serviceAccountClientId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
}
