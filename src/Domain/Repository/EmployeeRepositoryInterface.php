<?php

declare(strict_types=1);

namespace Company\Domain\Company\Repository;

use Company\Domain\Entity\Employee;
use Company\Domain\ValueObject\EmployeeIdentity;

interface EmployeeRepositoryInterface
{
    /**
     * @param EmployeeIdentity $identity
     * @return Employee|null
     */
    public function findByIdentity(EmployeeIdentity $identity): ?Employee;

    /**
     * @param Employee $employee
     * @return void
     */
    public function persist(Employee $employee);
}
