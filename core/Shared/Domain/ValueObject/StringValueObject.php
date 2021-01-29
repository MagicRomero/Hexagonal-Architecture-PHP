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
        $value_sanitized = filter_var($value, FILTER_SANITIZE_STRING);

        if (is_numeric($value_sanitized) || !is_string($value_sanitized)) {
            throw new InvalidArgumentException(static::class  . " the value {$value} is not allowed");
        }

        return $value_sanitized;
    }

    public function value(): string
    {
        return $this->value;
    }
}
