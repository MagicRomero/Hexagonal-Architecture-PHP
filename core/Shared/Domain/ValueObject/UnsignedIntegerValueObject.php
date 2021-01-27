<?php

declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class UnsignedIntegerValueObject
{
    protected $value;

    public function __construct(int $id)
    {
        $this->value = $this->validate($id);
    }

    public function validate(int $id): int
    {
        if (!filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min-range' => 1]])) {
            throw new InvalidArgumentException(static::class  . " the value {$id} is not allowed");
        }

        return abs($id);
    }

    public function value(): int
    {
        return $this->value;
    }


    public function isBiggerThan(UnsignedIntegerValueObject $other): bool
    {
        return $this->value() > $other->value();
    }
}
