<?php

declare(strict_types=1);


namespace Core\Acace\Client\Application\Create;

use Core\Acace\Client\Domain\ValueObjects\{ClientActive, ClientAlias, ClientDescription, ClientEmail, ClientId, ClientName};
use Core\Shared\Domain\Bus\Command\CommandHandler;

final class CreateClientCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(ClientCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateClientCommand $command)
    {
        $id = new ClientId($command->id());
        $name = new ClientName($command->name());
        $alias = new ClientAlias($command->alias());
        $email = new ClientEmail($command->email());
        $active = new ClientActive($command->active());
        $description = new ClientDescription($command->description());

        $this->creator->create($id, $name, $alias, $email, $active, $description);
    }
}
