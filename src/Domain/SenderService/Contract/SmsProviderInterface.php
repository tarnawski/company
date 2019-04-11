<?php

namespace Company\Domain\SenderService\Contract;

use Company\Domain\Company\Phone;
use Company\Domain\SenderService\ValueObject\SmsMessage;

interface SmsProviderInterface
{
    /**
     * @param SmsMessage $message
     * @param Phone $phone
     * @return bool
     */
    public function send(SmsMessage $message, Phone $phone): bool;
}