<?php

declare(strict_types=1);

namespace Company\Application\Query;

use Company\Domain\Company\Company;
use Company\Domain\Company\CompanyIdentity;
use Company\Domain\Contract\CompanyRepositoryInterface;

class CompanyQueryHandler
{
    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /**
     * @param CompanyQuery $query
     * @return Company|null
     */
    public function handle(CompanyQuery $query): ?Company
    {
        return $this->companyRepository->findByIdentity(new CompanyIdentity($query->getIdentity()));
    }
}