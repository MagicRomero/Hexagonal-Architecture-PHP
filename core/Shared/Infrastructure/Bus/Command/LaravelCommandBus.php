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

    public function dispatch(Command $command): void
    {
        if (!class_exists(get_class($command))) {
            throw new CommandNotRegisteredError($command);
        }

        $this->bus->dispatch($command);
    }
}
