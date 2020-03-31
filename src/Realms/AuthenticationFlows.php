<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

class AuthenticationFlows implements \JsonSerializable
{
    /** @var string */
    protected $alias;

    /** @var AuthenticationExecutionExportRepresentation */
    protected $authenticationExecutions;

    /** @var bool */
    protected $builtIn;

    /** @var string */
    protected $description;

    /** @var string */
    protected $id;

    /** @var string */
    protected $providerId;

    /** @var string */
    protected $topLevel;

    /**
     * AuthenticationFlows constructor.
     * @param $alias
     * @param $authenticationExecutions
     * @param $builtIn
     * @param $description
     * @param $id
     * @param $providerId
     * @param $topLevel
     */
    public function __construct(
        string $alias = '',
        AuthenticationExecutionExportRepresentation $authenticationExecutions,
        bool $builtIn = false,
        string $description = '',
        string $id = '',
        string $providerId = '',
        bool $topLevel = false
    ) {
        $this->alias = $alias;
        $this->authenticationExecutions = $authenticationExecutions;
        $this->builtIn = $builtIn;
        $this->description = $description;
        $this->id = $id;
        $this->providerId = $providerId;
        $this->topLevel = $topLevel;
    }

    public function jsonSerialize()
    {
        return json_encode(get_class_vars($this));
    }
}