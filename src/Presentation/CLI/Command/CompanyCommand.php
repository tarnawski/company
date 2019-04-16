<?php

namespace Company\Presentation\CLI\Command;

use Company\Application\Command\CreateCompanyCommand;
use Company\Application\ServiceBus\CommandBus;

class CompanyCommand
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

    public function execute()
    {
        $command = new CreateCompanyCommand(
            'company-identity',
            'name',
            'domain.eu'
        );

        $this->commandBus->handle($command);
    }
}