<?php

declare(strict_types=1);

namespace Company\Application\ServiceBus;

/**
 * "Two method one class to create command bus" :)
 */
class CommandBus
{
    /** @var array */
    private $handlers = [];

    /**
     * @param string $commandClass
     * @param $handler
     */
    public function register(string $commandClass, $handler) : void
    {
        $this->handlers[$commandClass] = $handler;
    }

    /**
     * @param $command
     */
    public function handle($command) : void
    {
        $this->handlers[get_class($command)]->handle($command);
    }
}

