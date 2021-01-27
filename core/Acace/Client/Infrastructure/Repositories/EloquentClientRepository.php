<?php

declare(strict_types=1);

namespace Core\Acace\Client\Infrastructure\Repositories;

use Core\Acace\Client\Domain\Contracts\ClientRepositoryContract;
use Core\Acace\Client\Domain\ValueObjects\{ClientId, ClientName, ClientAlias, ClientActive, ClientDescription, ClientEmail};
use App\Models\Client as EloquentClientModel;
use Core\Acace\Client\Domain\Client;

final class EloquentClientRepository implements ClientRepositoryContract
{
    private $model;

    public function __construct(EloquentClientModel $model)
    {
        $this->model = $model;
    }

    public function find(ClientAlias $alias): ?Client
    {
        $client = $this->model->findOrFail($alias->value());

        return new Client(
            new ClientName($client->name),
            new ClientAlias($client->alias),
            new ClientEmail($client->email),
            new ClientActive($client->active),
            new ClientDescription($client->description)
        );
    }

    public function save(Client $client): void
    {
        $this->model->create($client->asArray());
    }
}
