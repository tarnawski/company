<?php

declare(strict_types=1);

namespace Company\Infrastructure\Communication\EmailProvider;

use Company\Domain\Company\Phone;
use Company\Domain\SenderService\Contract\SmsProviderInterface;
use Company\Domain\SenderService\ValueObject\SmsMessage;

class SendGrid implements SmsProviderInterface
{
    /**
     * @param SmsMessage $message
     * @param Phone $phone
     * @return bool
     */
    public function send(SmsMessage $message, Phone $phone): bool
    {
        // TODO: Implement send() method.
    }
}