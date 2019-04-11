<?php

declare(strict_types=1);

namespace Company\Domain\Company;

use Company\Domain\Exception\CompanyException;

class Domain
{
    /** @var string */
    private $name;

    /**
     * @param string $name
     * @throws CompanyException
     */
    public function __construct(string $name)
    {
        if (!filter_var($name, FILTER_VALIDATE_DOMAIN)) {
            throw new CompanyException('Domain is invalid.');
        }

        $this->name = $name;
    }

    /**
     * @param Email $email
     * @return bool
     */
    public function checkEmailBelongToDomain(Email $email): bool
    {
        return $this->name === array_pop(explode('@', $email->getAddress()));
    }
}