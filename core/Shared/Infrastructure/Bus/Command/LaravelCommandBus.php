<?php

declare(strict_types=1);

namespace Core\Shared\Infrastructure\Bus\Command;

use Core\Shared\Domain\Bus\Command\{Command, CommandBus};
use Illuminate\Bus\Dispatcher;

final class LaravelCommandBus implements CommandBus
{
    private $bus;

    public function __construct(Dispatcher $bus)
    {
        $this->bus = $bus;
    }

    //@TODO - IMPLEMENTAR EL MESSAGE BUS PARA DISPATCH COMMANDOS
    public function dispatch(Command $command): void
    {
        //@TODO - HAY QUE VER COMO MANEJAR LAS EXCEPCIONES EN EL BUS DE COMANDOS
        $this->bus->dispatch($command);
    }
}
