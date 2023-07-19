<?php

declare(strict_types=1);

namespace App\UI\Request\Users;

use App\UI\Request\AbstractRequest;
use Symfony\Component\Validator\Constraints as Assert;

final class CreateUserRequest extends AbstractRequest
{
    protected function validationRules(): Assert\Collection
    {
        return new Assert\Collection([
            'name' => new Assert\NotBlank(),
            'email' => [
                new Assert\NotBlank(),
                new Assert\Email([
                    'message' => '"{{ value }}" is not a valid email.',
                ])
            ]
        ]);
    }
}
