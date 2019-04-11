<?php

declare(strict_types=1);

namespace Company\Domain\Company;

use Company\Domain\Exception\EmployeeException;

class Phone
{
    /** @var string */
    private $number;

    /**
     * @param string $number
     * @throws EmployeeException
     */
    public function __construct(string $number)
    {
        if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $number) == false) {
            throw new EmployeeException('Phone number is invalid.');
        }

        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}