<?php

declare(strict_types=1);

namespace Company\Domain\SenderService\ValueObject;

class SmsMessage
{
    /** @var string */
    private $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        //TODO validation

        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}