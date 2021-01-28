<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain;

use Core\Shared\Domain\Collection;

final class Clients extends Collection
{
    protected function type(): string
    {
        return Client::class;
    }
}
