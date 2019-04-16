<?php

declare(strict_types=1);

namespace Company\Infrastructure\Persistence\PDO;

use Company\Domain\Entity\Company;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\Company\Repository\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * @param CompanyIdentity $identity
     * @return Company
     */
    public function findByIdentity(CompanyIdentity $identity): Company
    {
        // TODO: Implement findByIdentity() method.
    }

    /**
     * @param Company $company
     */
    public function persist(Company $company): void
    {
        // TODO: Implement persist() method.
    }
}
