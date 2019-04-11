<?php

declare(strict_types=1);

namespace Company\Application\Command;

class AddEmployeeToCompanyCommand
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $email;

    /** @var string */
    private $phone;

    /** @var string */
    private $companyIdentity;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phone
     * @param string $companyIdentity
     */
    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $phone,
        string $companyIdentity
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->companyIdentity = $companyIdentity;
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

    /**
     * @return string
     */
    public function getCompanyIdentity(): string
    {
        return $this->companyIdentity;
    }
}