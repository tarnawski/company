<?php

declare(strict_types=1);

namespace Company\Domain\Company\Repository;


use Company\Domain\Entity\Company;
use Company\Domain\ValueObject\CompanyIdentity;

interface CompanyRepositoryInterface
{
    /**
     * @param CompanyIdentity $identity
     * @return Company|null
     */
    public function findByIdentity(CompanyIdentity $identity): ?Company;

    /**
     * @param Company $company
     * @return void
     */
    public function persist(Company $company);
}
