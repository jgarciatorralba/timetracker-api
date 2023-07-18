<?php

declare(strict_types=1);

namespace App\UI\Request;

use Symfony\Component\Validator\Constraints as Assert;

final class UpdateUserRequest extends AbstractRequest
{
    protected function validationRules(): Assert\Collection
    {
        return new Assert\Collection([
            'id' => new Assert\Required([
                new Assert\NotBlank(),
                new Assert\Type('string'),
                new Assert\Length(36)
            ]),
            'name' => new Assert\Optional(new Assert\NotBlank()),
            'email' => new Assert\Optional([
                new Assert\NotBlank(),
                new Assert\Email([
                    'message' => '"{{ value }}" is not a valid email.',
                ])
            ])
        ]);
    }
}
