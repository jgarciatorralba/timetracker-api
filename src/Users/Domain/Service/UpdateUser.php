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
        if (!empty($updatedData['name'])) {
            $user->updateName($updatedData['name']);
        }
        if (!empty($updatedData['email'])) {
            $user->updateEmail($updatedData['email']);
        }
        $user->updateUpdatedAt($updatedData['updated_at']);

        $this->userRepository->update($user);
    }
}
