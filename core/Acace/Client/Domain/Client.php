<?php


namespace Core\Acace\Client\Domain;

use Core\Acace\Client\Domain\ValueObjects\{ClientActive, ClientAlias, ClientDescription, ClientEmail, ClientId, ClientName};

final class Client
{
    private $name;
    private $alias;
    private $active;

    public function __construct(
        // ClientId $id,
        ClientName $name,
        ClientAlias $alias,
        ClientEmail $email,
        ClientActive $active,
        ?ClientDescription $description = null
    ) {
        // $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->description = $description;
        $this->email = $email;
        $this->active = $active;
    }

    // public function id(): ClientId
    // {
    //     return $this->id;
    // }

    public function name(): ClientName
    {
        return $this->name;
    }

    public function alias(): ClientAlias
    {
        return $this->alias;
    }

    public function description(): ?ClientDescription
    {
        return $this->description;
    }

    public function email(): ClientEmail
    {
        return $this->email;
    }

    public function active(): ClientActive
    {
        return $this->active;
    }

    public static function create(
        // ClientId $id,
        ClientName $name,
        ClientAlias $alias,
        ClientEmail $email,
        ClientActive $active,
        ?ClientDescription $description = null
    ) {
        return new self($name, $alias, $email, $active, $description);
    }

    public function asArray(): array
    {
        return [
            'name' => $this->name()->value(),
            'alias' => $this->alias()->value(),
            'description' => $this->description()->value(),
            'email' => $this->email()->value(),
            'active' => $this->active()->value(),
        ];
    }
}
