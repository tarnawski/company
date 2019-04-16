<?php

declare(strict_types=1);

namespace Company\Application\Command;

use Company\Domain\CompanyService;
use Company\Domain\ValueObject\CompanyIdentity;
use Company\Domain\ValueObject\Domain;

class CreateCompanyCommandHandler
{
    /** @var CompanyService */
    private $companyService;

    /**
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * @param CreateCompanyCommand $command
     */
    public function handle(CreateCompanyCommand $command): void
    {
        // Here we should catch business and infrastructure exceptions

        $this->companyService->createCompany(
            new CompanyIdentity($command->getIdentity()),
            $command->getName(),
            new Domain($command->getDomain())
        );
    }
}