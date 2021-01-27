<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

final class ClientActive
{
    private $value;

    public function __construct(bool $active = false)
    {
        $this->value = $active;
    }

    public function value(): bool
    {
        return $this->value;
    }
}
