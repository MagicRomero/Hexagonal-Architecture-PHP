<?php

declare(strict_types=1);

use Core\Acace\Client\Shared\Domain\Bus\Command\{Command, CommandBus};
use Core\Acace\Client\Shared\Infrastructure\Bus\Command\CommandNotRegisteredError;

final class inMemoryCommandBus implements CommandBus
{
    //@TODO - IMPLEMENTAR EL MESSAGE BUS PARA DISPATCH COMMANDOS
    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } catch (\Exception $error) {
            throw new CommandNotRegisteredError($command);
        }
    }
}
