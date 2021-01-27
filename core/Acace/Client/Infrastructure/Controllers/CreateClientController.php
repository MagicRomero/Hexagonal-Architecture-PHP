<?php


namespace Core\Acace\Client\Infrastructure\Controllers;

use App\Http\Requests\CreateClientRequest;
use Core\Acace\Client\Application\CreateClientUseCase;
use Core\Acace\Client\Domain\Client;
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
        $createClientUseCase = new CreateClientUseCase($this->repository);
        $createClientUseCase(
            $data['name'],
            $data['alias'],
            $data['email'],
            $data['active'] ?? false,
            $data['description'] ?? null
        );
    }
}
