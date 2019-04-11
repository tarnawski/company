<?php

declare(strict_types=1);

namespace Company\Domain\Company;

use Company\Domain\Exception\EmployeeException;

class Email
{
    /** @var string */
    private $address;

    /**
     * @param string $address
     * @throws EmployeeException
     */
    public function __construct(string $address)
    {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new EmployeeException('Email address is invalid.');
        }

        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}