<?php

declare(strict_types=1);

namespace Company\Domain\SenderService;

use Company\Domain\Contract\EmailProviderInterface;
use Company\Domain\Contract\SmsProviderInterface;
use Company\Domain\Entity\Employee;
use Company\Domain\SenderService\ValueObject\EmailMessage;
use Company\Domain\SenderService\ValueObject\SmsMessage;

class SenderService
{
    /** @var EmailProviderInterface */
    private $emailProvider;

    /** @var SmsProviderInterface */
    private $smsProvider;

    /**
     * @param EmailProviderInterface $emailProvider
     * @param SmsProviderInterface $smsProvider
     */
    public function __construct(EmailProviderInterface $emailProvider, SmsProviderInterface $smsProvider)
    {
        $this->emailProvider = $emailProvider;
        $this->smsProvider = $smsProvider;
    }

    /**
     * @param EmailMessage $message
     * @param Employee $employee
     * @return bool
     */
    public function sendEmailToEmployee(EmailMessage $message, Employee $employee): bool
    {
        return $this->emailProvider->send($message, $employee->getEmail());
    }

    /**
     * @param SmsMessage $message
     * @param Employee $employee
     * @return bool
     */
    public function sendSmsToEmployee(SmsMessage $message, Employee $employee): bool
    {
        return $this->smsProvider->send($message, $employee->getPhone());
    }
}