<?php


namespace Core\Acace\Client\Application;

use Core\Acace\Client\Domain\Client;
use Core\Acace\Client\Domain\Contracts\ClientRepositoryContract;
use Core\Acace\Client\Domain\ValueObjects\{ClientActive, ClientAlias, ClientDescription, ClientEmail, ClientName};

final class CreateClientUseCase
{
    private $repository;


    public function __construct(ClientRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name, string $alias, string $email, ?bool $active = false, ?string $description): void
    {
        $clientEntity = Client::create(
            new ClientName($name),
            new ClientAlias($alias),
            new ClientEmail($email),
            new ClientActive($active),
            new ClientDescription($description),
        );

        $this->repository->save($clientEntity);
    }
}
