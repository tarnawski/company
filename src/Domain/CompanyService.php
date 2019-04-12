<?php

declare(strict_types=1);

namespace Company\Domain;

use Company\Domain\Company\Repository\CompanyRepositoryInterface;
use Company\Domain\Entity\Company;
use Company\Domain\Entity\Employee;
use Company\Domain\Exception\CompanyException;

class CompanyService
{
    // Add logger and log business logs

    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /**
     * CompanyService constructor.
     * @param CompanyRepositoryInterface $companyRepository
     */
    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param Employee $employee
     * @param Company  $company
     * @throws CompanyException
     */
    public function assignEmployeeToCompany(Employee $employee, Company $company): void
    {
        if (count($company->getEmployees()) >= Company::MAX_NUMBER_OF_EMPLOYEES) {
            throw new CompanyException('The maximum number of employees has been reached.');
        }

        if (!$company->getDomain()->checkEmailBelongToDomain($employee->getEmail())) {
            throw new CompanyException('This user not belongs to company domain.');
        }

        $company->addEmployee($employee);
        $this->companyRepository->persist($company);
    }
}