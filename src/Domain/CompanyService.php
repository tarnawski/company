<?php

declare(strict_types=1);

namespace Company\Domain;

use Company\Domain\Company\Repository\CompanyRepositoryInterface;
use Company\Domain\Company\Repository\EmployeeRepositoryInterface;
use Company\Domain\Entity\Company;
use Company\Domain\Entity\Employee;
use Company\Domain\Exception\CompanyException;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\ValueObject\Domain;
use Company\Domain\ValueObject\Email;
use Company\Domain\ValueObject\EmployeeIdentity;
use Company\Domain\ValueObject\Phone;

class CompanyService
{
    // Add logger and log business logs

    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /** @var EmployeeRepositoryInterface */
    private $employeeRepository;

    /**
     * CompanyService constructor.
     * @param CompanyRepositoryInterface $companyRepository
     * @param EmployeeRepositoryInterface $employeeRepository
     */
    public function __construct(CompanyRepositoryInterface $companyRepository, EmployeeRepositoryInterface $employeeRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->employeeRepository = $employeeRepository;
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
     * @param EmployeeIdentity $identity
     * @param string $firstName
     * @param string $lastName
     * @param Phone $phone
     * @param Email $email
     * @return Employee
     */
    public function createEmployee(
        EmployeeIdentity $identity,
        string $firstName,
        string $lastName,
        Phone $phone,
        Email $email
    ): Employee {

        // Here we can use factory

        $employee = new Employee();
        $employee->setIdentity($identity);
        $employee->setFirstName($firstName);
        $employee->setLastName($lastName);
        $employee->setPhone($phone);
        $employee->setEmail($email);

        $this->employeeRepository->persist($employee);

        return $employee;
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

        $employee->setCompany($company);
        $this->employeeRepository->persist($employee);
    }
}