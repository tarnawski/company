<?php

declare(strict_types=1);

namespace Company\Application\Command;

use Company\Domain\Company\CompanyIdentity;
use Company\Domain\Company\Email;
use Company\Domain\Company\Employee;
use Company\Domain\Company\Phone;
use Company\Domain\Company\Contract\CompanyRepositoryInterface;

class AddEmployeeToCompanyCommandHandler
{
    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    public function handle(AddEmployeeToCompanyCommand $command): void
    {
        // TODO handle infrastructure exception
        $company = $this->companyRepository->findByIdentity(new CompanyIdentity($command->getCompanyIdentity()));

        // TODO handle business exception
        $employee = new Employee(
            $command->getFirstName(),
            $command->getLastName(),
            new Email($command->getEmail()),
            new Phone($command->getPhone())
        );

        $company->assignEmployee($employee);

        // TODO handle infrastructure exception
        $this->companyRepository->persist($company);
    }
}