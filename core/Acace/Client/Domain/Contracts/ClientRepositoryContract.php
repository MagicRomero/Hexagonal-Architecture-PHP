<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\Contracts;

use Core\Acace\Client\Domain\Client;
use Core\Acace\Client\Domain\ValueObjects\{ClientAlias};

interface ClientRepositoryContract
{
    public function find(ClientAlias $alias): ?Client;

    public function save(Client $client): void;
}
