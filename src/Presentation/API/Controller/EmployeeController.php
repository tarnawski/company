<?php

declare(strict_types=1);

namespace Company\Presentation\API\Controller;

use Company\Application\Command\AddEmployeeToCompanyCommand;
use Company\Application\ServiceBus\CommandBus;
use Company\Application\ServiceBus\QueryBus;

class EmployeeController
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

    public function createAction()
    {
        //TODO get parameters from request

        $command = new AddEmployeeToCompanyCommand(
            'first-name',
            'last-name',
            'email',
            'phone',
            'company-identity'
        );

        $this->commandBus->handle($command);

        //TODO redirect to showAction in CompanyController (??)
    }
}