<?php

declare(strict_types=1);

namespace Company\Application\Query;

class CompanyQuery
{
    /** @var string */
    private $identity;

    /**
     * @param string $identity
     */
    public function __construct(string $identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }
}