<?php

declare(strict_types=1);

namespace Company\Infrastructure\Persistence\PDO;

use Company\Domain\Company\Company;
use Company\Domain\Company\CompanyIdentity;
use Company\Domain\Company\Contract\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * @param CompanyIdentity $identity
     * @return Company
     */
    public function findByIdentity(CompanyIdentity $identity): Company
    {
        // TODO: Implement get() method.
    }

    /**
     * @param Company $company
     */
    public function persist(Company $company): void
    {
        // TODO: Implement add() method.
    }
}