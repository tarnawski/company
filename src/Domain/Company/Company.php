<?php

declare(strict_types=1);

namespace Company\Domain\Company;

use Company\Domain\Exception\CompanyException;

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
     * Company constructor.
     * @param CompanyIdentity $identity
     * @param string $name
     * @param Domain $domain
     * @param array $employees
     * @throws CompanyException
     */
    public function __construct(CompanyIdentity $identity, string $name, Domain $domain, array $employees = [])
    {
        if (count($employees) >= self::MAX_NUMBER_OF_EMPLOYEES) {
            throw new CompanyException('The maximum number of employees has been reached.');
        }

        $this->identity = $identity;
        $this->name = $name;
        $this->domain = $domain;
        $this->employees = $employees;
    }

    /**
     * @param Employee $employee
     * @throws CompanyException
     */
    public function assignEmployee(Employee $employee): void
    {
        if (count($this->employees) >= self::MAX_NUMBER_OF_EMPLOYEES) {
            throw new CompanyException('The maximum number of employees has been reached.');
        }

        if (!$this->domain->checkEmailBelongToDomain($employee->getEmail())) {
            throw new CompanyException('This user not belongs to company domain.');
        }

        $this->employees[] = $employee;
    }
}
