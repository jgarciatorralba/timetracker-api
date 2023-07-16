<?php

declare(strict_types=1);

namespace App\Users\Application\Command\CreateUser;

use App\Users\Domain\User;
use App\Users\Domain\Contract\UserRepository;
use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;

final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}
    
    public function __invoke(CreateUserCommand $command): void
    {
        $user = User::create(
            id: Uuid::fromString($command->id()),
            name: $command->name(),
            email: $command->email(),
            createdAt: $command->createdAt(),
            updatedAt: $command->updatedAt()
        );

        $this->userRepository->create($user);
    }
}
