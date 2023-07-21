<?php

declare(strict_types=1);

namespace App\Users\Domain\Service;

use App\Users\Domain\Contract\UserRepository;
use App\Users\Domain\User;

final class DeleteUser
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function __invoke(User $user, array $updatedData): void
    {
        $user->updateUpdatedAt($updatedData['updated_at']);
        $user->updateDeletedAt($updatedData['deleted_at']);
        $this->userRepository->delete($user);
    }
}
