<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

class AuthenticationExecutionExportRepresentation implements \JsonSerializable
{
    /** @var string */
    protected $authenticator;

    /** @var string */
    protected $authenticatorConfig;

    /** @var bool */
    protected $authenticatorFlow;

    /** @var bool */
    protected $autheticatorFlow;

    /** @var string */
    protected $flowAlias;

    /** @var int */
    protected $priority;

    /** @var string */
    protected $requirement;

    /** @var string */
    protected $userSetupAllowed;

    /**
     * AuthenticationExecutionExportRepresentation constructor.
     *
     * @param string $authenticator
     * @param string $authenticatorConfig
     * @param bool $authenticatorFlow
     * @param bool $autheticatorFlow
     * @param string $flowAlias
     * @param int $priority
     * @param string $requirement
     * @param string $userSetupAllowed
     */
    public function __construct(
        $authenticator = '',
        $authenticatorConfig = '',
        $authenticatorFlow = false,
        $autheticatorFlow = false,
        $flowAlias = '',
        $priority = 0,
        $requirement = '',
        $userSetupAllowed = ''
    ) {
        $this->authenticator = $authenticator;
        $this->authenticatorConfig = $authenticatorConfig;
        $this->authenticatorFlow = $authenticatorFlow;
        $this->autheticatorFlow = $autheticatorFlow;
        $this->flowAlias = $flowAlias;
        $this->priority = $priority;
        $this->requirement = $requirement;
        $this->userSetupAllowed = $userSetupAllowed;
    }

    public function jsonSerialize()
    {
        return json_encode(get_class_vars($this));
    }
}
