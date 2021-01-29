<?php

declare(strict_types=1);

namespace Core\Acace\Client\Infrastructure\Services;

use Core\Acace\Client\Application\Create\CreateClientCommand;
use Core\Shared\Infrastructure\Services\BaseService;

final class ClientService extends BaseService
{
    public function create(array $data): void
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
