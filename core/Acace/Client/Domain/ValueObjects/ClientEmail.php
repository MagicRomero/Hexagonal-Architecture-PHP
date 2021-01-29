<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

use InvalidArgumentException;

final class ClientEmail
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $this->validate($value);
    }

    public function validate(string $value): string
    {
        $value_sanitized = filter_var($value, FILTER_SANITIZE_EMAIL);

        if (!filter_var($value_sanitized, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(static::class  . " the value {$value} is not allowed");
        }

        return $value_sanitized;
    }


    public function value(): string
    {
        return $this->value;
    }

    public function provider(): string
    {
        $email = $this->value();

        return mb_substr($value, mb_strripos($value, '@') + 1);
    }
}
