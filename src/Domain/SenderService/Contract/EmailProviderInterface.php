<?php

namespace Company\Domain\SenderService\Contract;

use Company\Domain\Company\Email;
use Company\Domain\SenderService\ValueObject\EmailMessage;

interface EmailProviderInterface
{
    /**
     * @param EmailMessage $message
     * @param Email $email
     * @return bool
     */
    public function send(EmailMessage $message, Email $email): bool;
}