<?php

declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject;

abstract class BooleanValueObject
{

    protected $value;

    public function __construct(bool $active = false)
    {
        $this->value = $active;
    }

    public function value(): bool
    {
        return $this->value;
    }
}
