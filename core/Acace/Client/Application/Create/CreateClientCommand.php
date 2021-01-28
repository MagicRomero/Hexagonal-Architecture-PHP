<?php

declare(strict_types=1);


namespace Core\Acace\Client\Application\Create;

use Core\Shared\Domain\Bus\Command\Command;

final class CreateClientCommand implements Command
{
    private $id;
    private $name;
    private $alias;
    private $description;
    private $email;
    private $active;

    public function __construct(string $id, string $name, string $alias, string $email, ?bool $active = false, ?string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->description = $description;
        $this->email = $email;
        $this->active = $active;
    }


    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function alias(): string
    {
        return $this->alias;
    }


    public function email(): string
    {
        return $this->email;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public function description(): ?string
    {
        return $this->description;
    }
}
