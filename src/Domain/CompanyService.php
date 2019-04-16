<?php

declare(strict_types=1);

namespace Company\Domain;

use Company\Domain\Company\Repository\CompanyRepositoryInterface;
use Company\Domain\Entity\Company;
use Company\Domain\Entity\Employee;
use Company\Domain\Exception\CompanyException;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\ValueObject\Domain;

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
     * @param CompanyIdentity $identity
     * @param string $name
     * @param Domain $domain
     * @return Company
     */
    public function createCompany(CompanyIdentity $identity, string $name, Domain $domain): Company
    {
        // Here we can use factory

        $company = new Company();
        $company->setIdentity($identity);
        $company->setDomain($domain);
        $company->setName($name);

        $this->companyRepository->persist($company);

        return $company;
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