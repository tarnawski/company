<?php

declare(strict_types=1);

namespace Company\Domain\Company;

class Employee
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var Email */
    private $email;

    /** @var Phone|null */
    private $phone;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param Email $email
     * @param Phone $phone
     */
    public function __construct(string $firstName, string $lastName, Email $email, Phone $phone = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Phone|null
     */
    public function getPhone(): ?Phone
    {
        return $this->phone;
    }
}