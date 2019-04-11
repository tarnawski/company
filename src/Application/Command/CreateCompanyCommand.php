<?php

declare(strict_types=1);

namespace Company\Application\Command;

class CreateCompanyCommand
{
    /** @var string */
    private $identity;

    /** @var string */
    private $name;

    /** @var string */
    private $domain;

    /**
     * CreateCompany constructor.
     * @param string $identity
     * @param string $name
     * @param string $domain
     */
    public function __construct(string $identity, string $name, string $domain)
    {
        $this->identity = $identity;
        $this->name = $name;
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }
}