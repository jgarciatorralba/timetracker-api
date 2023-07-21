<?php

declare(strict_types=1);

namespace App\Users\Application\Command\UpdateUser;

use App\Users\Domain\Service\FindUserById;
use App\Users\Domain\Service\UpdateUser;
use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;

final class UpdateUserCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly FindUserById $findUserById,
        private readonly UpdateUser $updateUser
    ) {
    }

    public function __invoke(UpdateUserCommand $command): void
    {
        $userId = Uuid::fromString($command->id());
        $user = $this->findUserById->__invoke($userId);

        $this->updateUser->__invoke($user, [
            'name' => $command->name(),
            'email' => $command->email(),
            'updated_at' => $command->updatedAt()
        ]);
    }
}
