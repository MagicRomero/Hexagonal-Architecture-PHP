<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

use InvalidArgumentException;

final class ClientName
{
    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }


    public function validate(string $alias): string
    {
        if (!filter_var($alias, FILTER_SANITIZE_STRING)) {
            throw new InvalidArgumentException(static::class  . " the value {$alias} is not allowed");
        }

        return $alias;
    }

    public function value(): string
    {
        return $this->value;
    }
}
