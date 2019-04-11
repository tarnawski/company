<?php

declare(strict_types=1);

namespace Company\Application\Command;

use Company\Domain\Company\Company;
use Company\Domain\Company\CompanyIdentity;
use Company\Domain\Company\InternetDomain;
use Company\Domain\Contract\CompanyRepositoryInterface;

class CreateCompanyCommandHandler
{
    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    /**
     * @param CreateCompanyCommand $command
     */
    public function handle(CreateCompanyCommand $command): void
    {
        $company = new Company(
            new CompanyIdentity($command->getIdentity()),
            $command->getName(),
            new InternetDomain($command->getDomain())
        );

        $this->companyRepository->persist($company);
    }
}