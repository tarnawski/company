<?php

declare(strict_types=1);

namespace Company\Domain\Company\Contract;

use Company\Domain\Company\Company;
use Company\Domain\Company\CompanyIdentity;

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
