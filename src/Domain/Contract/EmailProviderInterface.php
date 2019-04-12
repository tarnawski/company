<?php

namespace Company\Domain\Contract;

use Company\Domain\ValueObject\Email;
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