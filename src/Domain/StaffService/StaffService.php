<?php

declare(strict_types=1);

namespace Company\Domain\StaffService;

use Company\Domain\Company\Company;
use Company\Domain\Company\Employee;
use Company\Domain\Company\Contract\CompanyRepositoryInterface;
use Company\Domain\SenderService\SenderService;
use Company\Domain\Exception\CompanyException;
use Company\Domain\SenderService\ValueObject\EmailMessage;
use Company\Domain\SenderService\ValueObject\SmsMessage;

class StaffService
{
    /** @var SenderService */
    private $senderService;

    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /**
     * @param SenderService $senderService
     */
    public function __construct(SenderService $senderService)
    {
        $this->senderService = $senderService;
    }

    /**
     * @param Employee $employee
     * @param Company $company
     * @throws CompanyException
     */
    public function assignEmployeeToCompany(Employee $employee, Company $company): void
    {
        $company->assignEmployee($employee);
        $this->companyRepository->persist($company);

        $this->senderService->sendEmailToEmployee(
            new EmailMessage('Hi', 'Welcome on board!'),
            $employee
        );

        if (null === $employee->getPhone()) {
            return;
        }

        $this->senderService->sendSmsToEmployee(
            new SmsMessage('Welcome on board!'),
            $employee
        );
    }
}