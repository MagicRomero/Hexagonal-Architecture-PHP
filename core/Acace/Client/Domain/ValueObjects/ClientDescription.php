<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

final class ClientDescription
{
    private $value;

    public function __construct(?string $description = null)
    {
        $this->value = $description;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
