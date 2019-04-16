<?php

declare(strict_types=1);

namespace Company\Application\Command;

class CreateEmployeeCommand
{
    /** @var string */
    private $identity;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $email;

    /** @var string */
    private $phone;

    /**
     * CreateEmployeeCommand constructor.
     * @param string $identity
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phone
     */
    public function __construct(string $identity, string $firstName, string $lastName, string $email, string $phone)
    {
        $this->identity = $identity;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}