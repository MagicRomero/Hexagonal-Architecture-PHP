<?php

declare(strict_types=1);


namespace Core\Acace\Client\Application\Create;

use Core\Acace\Client\Shared\Domain\Bus\Command\Command;

final class CreateClientCommand implements Command
{
    private $name;
    private $alias;
    private $description;
    private $email;
    private $active;

    public function __construct(string $name, string $alias, string $email, ?bool $active = false, ?string $description)
    {
        $this->name = $name;
        $this->alias = $alias;
        $this->description = $description;
        $this->email = $email;
        $this->active = $active;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function alias(): string
    {
        return $this->alias;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function active(): bool
    {
        return $this->active;
    }
}
