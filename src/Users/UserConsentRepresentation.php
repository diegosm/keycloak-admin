<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class UserConsentRepresentation
{
    /**
     * @Type("string")
     * @SerializedName("clientId")
     */
    private $clientId;

    /**
     * @Type("integer")
     * @SerializedName("createdDate")
     */
    private $createdDate;

    /**
     * @Type("array")
     * @SerializedName("grantedClientScopes")
     */
    private $grantedClientScopes;

    /**
     * @Type("integer")
     * @SerializedName("lastUpdatedDate")
     */
    private $lastUpdatedDate;

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     * @return UserConsentRepresentation
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
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
     * @return UserConsentRepresentation
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrantedClientScopes()
    {
        return $this->grantedClientScopes;
    }

    /**
     * @param mixed $grantedClientScopes
     * @return UserConsentRepresentation
     */
    public function setGrantedClientScopes($grantedClientScopes)
    {
        $this->grantedClientScopes = $grantedClientScopes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * @param mixed $lastUpdatedDate
     * @return UserConsentRepresentation
     */
    public function setLastUpdatedDate($lastUpdatedDate)
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
        return $this;
    }
}
