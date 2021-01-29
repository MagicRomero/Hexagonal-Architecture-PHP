<?php

declare(strict_types=1);

namespace Core\Acace\Client\Application\Create;

use Core\Acace\Client\Domain\Client;
use Core\Acace\Client\Domain\Contracts\ClientRepositoryContract;
use Core\Acace\Client\Domain\ValueObjects\{ClientActive, ClientAlias, ClientDescription, ClientEmail, ClientId, ClientName};
use Core\Shared\Domain\Bus\Event\EventBus;

final class ClientCreator
{
    private $repository;
    // private $eventBus;

    public function __construct(ClientRepositoryContract $repository/*, EventBus $eventBus*/)
    {
        $this->repository = $repository;
        // $this->eventBus = $eventBus;
    }

    public function create(
        ClientId $id,
        ClientName $name,
        ClientAlias $alias,
        ClientEmail $email,
        ClientActive $active,
        ?ClientDescription $description = null
    ): void {

        $client = Client::create($id, $name, $alias, $email, $active, $description);

        $this->repository->save($client);
    }
}
