<?php

declare(strict_types=1);

namespace App\Users\Domain\Service;

use App\Users\Domain\User;
use App\Users\Domain\Contract\UserRepository;
use App\Users\Domain\Exception\EmailAlreadyInUseException;

final class CreateUser
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function __invoke(User $user): void
    {
        $existingUsers = $this->userRepository->findByCriteria(['email' => $user->email()]);
        if (!empty($existingUsers)) {
            throw new EmailAlreadyInUseException($user->email());
        }

        $this->userRepository->create($user);
    }
}
