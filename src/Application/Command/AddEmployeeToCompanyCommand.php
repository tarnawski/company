<?php

declare(strict_types=1);

namespace Company\Application\Command;

class AddEmployeeToCompanyCommand
{
    /** @var string */
    private $employeeIdentity;

    /** @var string */
    private $companyIdentity;

    /**
     * @param string $employeeIdentity
     * @param string $companyIdentity
     */
    public function __construct(string $employeeIdentity, string $companyIdentity)
    {
        $this->employeeIdentity = $employeeIdentity;
        $this->companyIdentity = $companyIdentity;
    }

    /**
     * @return string
     */
    public function getEmployeeIdentity(): string
    {
        return $this->employeeIdentity;
    }

    /**
     * @return string
     */
    public function getCompanyIdentity(): string
    {
        return $this->companyIdentity;
    }
}