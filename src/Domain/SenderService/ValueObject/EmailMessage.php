<?php

declare(strict_types=1);

namespace Company\Domain\SenderService\ValueObject;

class EmailMessage
{
    /** @var string */
    private $title;

    /** @var string */
    private $content;

    /**
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        //TODO validation

        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}