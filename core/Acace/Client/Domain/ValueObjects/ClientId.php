<?php

declare(strict_types=1);

namespace Core\Acace\Client\Domain\ValueObjects;

use InvalidArgumentException;

final class ClientId
{
    private $value;

    public function __construct(int $id)
    {
        $this->value = $this->validate($id);
    }

    public function validate(int $id): ?int
    {
        if (!filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min-range' => 1]])) {
            throw new InvalidArgumentException(static::class  . " the value {$id} is not allowed");
        }

        return $id;
    }


    public function value(): int
    {
        return $this->value;
    }
}
