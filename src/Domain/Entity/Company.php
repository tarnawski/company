<?php

declare(strict_types=1);

namespace Company\Domain\Entity;

use Company\Domain\Exception\CompanyException;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\ValueObject\Domain;

class Company
{
    const MAX_NUMBER_OF_EMPLOYEES = 10;

    /** @var CompanyIdentity */
    private $identity;

    /** @var string */
    private $name;

    /** @var Domain */
    private $domain;

    /** @var Employee[] */
    private $employees;

    /**
     * @return CompanyIdentity
     */
    public function getIdentity(): CompanyIdentity
    {
        return $this->identity;
    }

    /**
     * @param CompanyIdentity $identity
     */
    public function setIdentity(CompanyIdentity $identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Domain
     */
    public function getDomain(): Domain
    {
        return $this->domain;
    }

    /**
     * @param Domain $domain
     */
    public function setDomain(Domain $domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return Employee[]
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * @param Employee $employee
     */
    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }
}
