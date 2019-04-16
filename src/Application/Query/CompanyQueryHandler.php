<?php

declare(strict_types=1);

namespace Company\Application\Query;


use Company\Domain\Company\Repository\CompanyRepositoryInterface;
use Company\Domain\Entity\Company;
use Company\Domain\ValueObject\CompanyIdentity;

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