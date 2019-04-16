<?php

declare(strict_types=1);

namespace Company\Application\Command;

use Company\Domain\Company\Repository\CompanyRepositoryInterface;
use Company\Domain\Company\Repository\EmployeeRepositoryInterface;
use Company\Domain\CompanyService;
use Company\Domain\SenderService\SenderService;
use Company\Domain\SenderService\ValueObject\EmailMessage;
use Company\Domain\SenderService\ValueObject\SmsMessage;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\ValueObject\EmployeeIdentity;

class AddEmployeeToCompanyCommandHandler
{
    /** @var CompanyService */
    private $companyService;

    /** @var SenderService */
    private $senderService;

    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /** @var EmployeeRepositoryInterface */
    private $employeeRepository;

    /**
     * @param CompanyService $companyService
     * @param SenderService $senderService
     * @param CompanyRepositoryInterface $companyRepository
     * @param EmployeeRepositoryInterface $employeeRepository
     */
    public function __construct(
        CompanyService $companyService,
        SenderService $senderService,
        CompanyRepositoryInterface $companyRepository,
        EmployeeRepositoryInterface $employeeRepository
    ) {
        $this->companyService = $companyService;
        $this->senderService = $senderService;
        $this->companyRepository = $companyRepository;
        $this->employeeRepository = $employeeRepository;
    }


    public function handle(AddEmployeeToCompanyCommand $command): void
    {
        // TODO handle infrastructure exception
        $company = $this->companyRepository->findByIdentity(new CompanyIdentity($command->getCompanyIdentity()));
        $employee = $this->employeeRepository->findByIdentity(new EmployeeIdentity($command->getEmployeeIdentity()));

        // TODO handle domain exceptions
        $this->companyService->assignEmployeeToCompany($employee, $company);

        $this->senderService->sendEmailToEmployee(
            new EmailMessage('Hi!', 'Welcome on board!'),
            $employee
        );

        $this->senderService->sendSmsToEmployee(
            new SmsMessage('Welcome on board!'),
            $employee
        );
    }
}