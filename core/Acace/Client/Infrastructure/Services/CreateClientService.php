<?php

declare(strict_types=1);

namespace Core\Acace\Client\Infrastructure\Services;

use Core\Acace\Client\Application\Create\CreateClientCommand;
use Core\Shared\Infrastructure\Services\BaseService;

final class CreateClientService extends BaseService
{

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
