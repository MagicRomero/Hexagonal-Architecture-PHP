<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

use InvalidArgumentException;

final class ClientEmail
{
    private $value;

    public function __construct(string $email)
    {
        $this->value = $this->validate($email);
    }

    public function validate(string $email): string
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(static::class  . " the value {$email} is not allowed");
        }

        return $email;
    }


    public function value(): string
    {
        return $this->value;
    }

    public function provider(): string
    {
        $email = $this->value();

        return mb_substr($email, mb_strripos($email, '@') + 1);
    }
}
