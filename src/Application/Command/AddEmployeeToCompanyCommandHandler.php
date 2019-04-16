<?php

declare(strict_types=1);

namespace Company\Application\Command;

use Company\Domain\Company\Repository\CompanyRepositoryInterface;
use Company\Domain\CompanyService;
use Company\Domain\Entity\Employee;
use Company\Domain\SenderService\SenderService;
use Company\Domain\SenderService\ValueObject\EmailMessage;
use Company\Domain\SenderService\ValueObject\SmsMessage;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\ValueObject\Email;
use Company\Domain\ValueObject\Phone;

class AddEmployeeToCompanyCommandHandler
{
    /** @var CompanyService */
    private $companyService;

    /** @var SenderService */
    private $senderService;

    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /**
     * AddEmployeeToCompanyCommandHandler constructor.
     * @param CompanyService $companyService
     * @param SenderService $senderService
     * @param CompanyRepositoryInterface $companyRepository
     */
    public function __construct(CompanyService $companyService, SenderService $senderService, CompanyRepositoryInterface $companyRepository)
    {
        $this->companyService = $companyService;
        $this->senderService = $senderService;
        $this->companyRepository = $companyRepository;
    }


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