<?php

declare(strict_types=1);

namespace Company\Domain\Entity;

use Company\Domain\ValueObject\Email;
use Company\Domain\ValueObject\EmployeeIdentity;
use Company\Domain\ValueObject\Phone;

class Employee
{
    /** @var  EmployeeIdentity */
    private $identity;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var Email */
    private $email;

    /** @var Phone|null */
    private $phone;

    /**
     * Employee constructor.
     * @param EmployeeIdentity $identity
     * @param string           $firstName
     * @param string           $lastName
     * @param Email            $email
     * @param Phone|null       $phone
     */
    public function __construct(EmployeeIdentity $identity, $firstName, $lastName, Email $email, $phone = null)
    {
        $this->identity = $identity;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return EmployeeIdentity
     */
    public function getIdentity(): EmployeeIdentity
    {
        return $this->identity;
    }

    /**
     * @param EmployeeIdentity $identity
     */
    public function setIdentity(EmployeeIdentity $identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email)
    {
        $this->email = $email;
    }

    /**
     * @return Phone|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param Phone|null $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}