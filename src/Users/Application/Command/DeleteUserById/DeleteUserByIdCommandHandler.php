<?php

declare(strict_types=1);

namespace App\Users\Application\Command\DeleteUserById;

use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;
use App\Users\Domain\Service\DeleteUser;
use App\Users\Domain\Service\FindUserById;

final class DeleteUserByIdCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly FindUserById $findUserById,
        private readonly DeleteUser $deleteUser
    ) {
    }

    public function __invoke(DeleteUserByIdCommand $command): void
    {
        $userId = Uuid::fromString($command->id());
        $user = $this->findUserById->__invoke($userId);

        $this->deleteUser->__invoke($user);
    }
}
