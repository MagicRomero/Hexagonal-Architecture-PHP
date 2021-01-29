<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

use Core\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class ClientAlias extends StringValueObject
{
    public function validate(string $value): string
    {
        if (!parent::validate($value) || preg_match('/\s/', $value)) {
            throw new InvalidArgumentException(static::class  . " the value {$value} is not allowed");
        }

        return $value;
    }
}
