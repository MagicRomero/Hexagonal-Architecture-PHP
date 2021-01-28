<?php

declare(strict_types=1);

namespace Core\Acace\Client\Infrastructure\Services;

use Core\Acace\Client\Application\Create\CreateClientCommand;
use Core\Shared\Domain\Bus\Command\CommandBus;

final class CreateClientService
{
    private $bus;
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }
    public function __invoke(array $data): void
    {
        $this->bus->dispatch(new CreateClientCommand(
            $data['id'],
            $data['name'],
            $data['alias'],
            $data['email'],
            $data['active'] ?? false,
            $data['description'] ?? null
        ));
    }
}
