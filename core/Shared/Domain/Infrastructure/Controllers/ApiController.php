<?php

declare(strict_types=1);

use Core\Acace\Client\Shared\Domain\Bus\Command\{CommandBus, Command};

abstract class ApiController
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
