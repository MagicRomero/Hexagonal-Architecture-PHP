<?php

declare(strict_types=1);

namespace Core\Shared\Infrastructure\Services;

use Core\Shared\Domain\Bus\Command\CommandBus;

class BaseService
{
    protected $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }
}
