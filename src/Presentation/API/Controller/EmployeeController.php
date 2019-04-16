<?php

declare(strict_types=1);

namespace Company\Presentation\API\Controller;

use Company\Application\Command\AddEmployeeToCompanyCommand;
use Company\Application\Command\CreateEmployeeCommand;
use Company\Application\ServiceBus\CommandBus;

class EmployeeController
{
    /** @var CommandBus */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createAction()
    {
        $command = new CreateEmployeeCommand(
            'employee-identity',
            'first-name',
            'last-name',
            'email',
            'phone'
        );

        $this->commandBus->handle($command);
    }

    public function assignAction()
    {
        $command = new AddEmployeeToCompanyCommand(
            'employee-identity',
            'company-identity'
        );

        $this->commandBus->handle($command);
    }
}