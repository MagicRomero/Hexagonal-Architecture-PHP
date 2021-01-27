<?php

declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class StringValueObject
{

    protected $value;

    public function __construct(string $value)
    {
        $this->value = $this->validate($value);
    }

    public function validate(string $value): string
    {
        if (!filter_var($value, FILTER_SANITIZE_STRING)) {
            throw new InvalidArgumentException(static::class  . " the value {$value} is not allowed");
        }

        return $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
