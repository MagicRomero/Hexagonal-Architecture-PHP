<?php

declare(strict_types=1);

namespace Core\Acace\Client\Infrastructure\Controllers;

use Core\Acace\Client\Domain\Contracts\ClientRepositoryContract;

final class CreateClientController
{
    private $repository;

    public function __construct(ClientRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array $data): void
    {
        // $createClientUseCase = new CreateClientUseCase($this->repository);
        // $createClientUseCase(
        //     $data['name'],
        //     $data['alias'],
        //     $data['email'],
        //     $data['active'] ?? false,
        //     $data['description'] ?? null
        // );
    }
}
