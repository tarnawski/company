<?php

declare(strict_types=1);

namespace Company\Application\Command;

use Company\Domain\CompanyService;
use Company\Domain\ValueObject\Email;
use Company\Domain\ValueObject\EmployeeIdentity;
use Company\Domain\ValueObject\Phone;

class CreateEmployeeCommandHandler
{
    /** @var CompanyService */
    private $companyService;

    /**
     * CreateEmployeeCommandHandler constructor.
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function handle(CreateEmployeeCommand $command): void
    {
        // TODO handle domain exceptions
        $this->companyService->createEmployee(
            new EmployeeIdentity($command->getIdentity()),
            $command->getFirstName(),
            $command->getLastName(),
            new Phone($command->getPhone()),
            new Email($command->getEmail())
        );
    }
}