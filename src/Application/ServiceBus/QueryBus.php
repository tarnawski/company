<?php

declare(strict_types=1);

namespace Company\Application\ServiceBus;

class QueryBus
{
    /** @var array */
    private $handlers = [];

    /**
     * @param string $queryClass
     * @param $handler
     */
    public function register(string $queryClass, $handler) : void
    {
        $this->handlers[$queryClass] = $handler;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function handle($query)
    {
        return $this->handlers[get_class($query)]->handle($query);
    }
}