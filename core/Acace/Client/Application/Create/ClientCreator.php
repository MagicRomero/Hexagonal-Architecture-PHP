<?php

declare(strict_types=1);

namespace Core\Acace\Client\Application\Create;

use Core\Acace\Client\Domain\Client;
use Core\Acace\Client\Domain\Contracts\ClientRepositoryContract;
use Core\Acace\Client\Domain\ValueObjects\{ClientActive, ClientAlias, ClientDescription, ClientEmail, ClientName};

final class ClientCreator
{
    private $repository;

    public function __construct(ClientRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function create(
        ClientName $name,
        ClientAlias $alias,
        ClientEmail $email,
        ClientActive $active,
        ?ClientDescription $description = null
    ): void {

        $client = Client::create($name, $alias, $email, $active, $description);

        $this->repository->save($client);
    }
}
