<?php

declare(strict_types=1);

namespace Company\Presentation\API\Controller;

use Company\Application\Query\CompanyQuery;
use Company\Application\ServiceBus\CommandBus;
use Company\Application\ServiceBus\QueryBus;

class CompanyController
{
    /** @var CommandBus */
    private $commandBus;

    /** @var QueryBus */
    private $queryBus;

    /**
     * @param CommandBus $commandBus
     * @param QueryBus $queryBus
     */
    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function showAction()
    {
        //TODO get parameters from request

        $query = new CompanyQuery('company-identity-from-request');
        $company = $this->queryBus->handle($query);

        //TODO return company information
    }
}