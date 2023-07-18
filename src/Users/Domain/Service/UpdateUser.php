<?php

declare(strict_types=1);

namespace App\Users\Domain\Service;

use App\Users\Domain\User;
use App\Users\Domain\Contract\UserRepository;

final class UpdateUser
{
    public function __construct(
       private readonly UserRepository $userRepository
    ) {}

    public function __invoke(User $user, array $updatedData): void
    {
        $hasChanged = false;

        if (!empty($updatedData['name']) && $updatedData['name'] !== $user->name()) {
            $user->updateName($updatedData['name']);
            $hasChanged = true;
        }
        if (!empty($updatedData['email']) && $updatedData['email'] !== $user->email()) {
            $user->updateEmail($updatedData['email']);
            $hasChanged = true;
        }

        if ($hasChanged) {
            $user->updateUpdatedAt($updatedData['updated_at']);
            $this->userRepository->update($user);
        }
    }
}
