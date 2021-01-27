<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

final class ClientDescription
{
    protected $value;

    public function __construct(?string $value)
    {
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
