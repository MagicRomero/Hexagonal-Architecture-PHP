<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

use Core\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class ClientAlias extends StringValueObject
{

    public function validate(string $alias): string
    {
        if (!filter_var($alias, FILTER_SANITIZE_STRING) || preg_match('/\s/', $alias)) {
            throw new InvalidArgumentException(static::class  . " the value {$alias} is not allowed");
        }

        return $alias;
    }
}
