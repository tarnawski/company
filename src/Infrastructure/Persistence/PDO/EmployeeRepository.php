<?php

declare(strict_types=1);

namespace Company\Infrastructure\Persistence\PDO;

use Company\Domain\Company\Repository\EmployeeRepositoryInterface;
use Company\Domain\Entity\Employee;
use Company\Domain\ValueObject\EmployeeIdentity;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @param EmployeeIdentity $identity
     * @return Employee
     */
    public function findByIdentity(EmployeeIdentity $identity): Employee
    {
        // TODO: Implement findByIdentity() method.
    }

    /**
     * @param Employee $employee
     */
    public function persist(Employee $employee): void
    {
        // TODO: Implement persist() method.
    }
}
