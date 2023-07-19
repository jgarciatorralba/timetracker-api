<?php

declare(strict_types=1);

namespace App\UI\Request\WorkEntries;

use App\UI\Request\AbstractRequest;
use Symfony\Component\Validator\Constraints as Assert;

final class CreateWorkEntryRequest extends AbstractRequest
{
    protected function validationRules(): Assert\Collection
    {
        return new Assert\Collection([
            'userId' => new Assert\Required([
                new Assert\NotBlank(),
                new Assert\Type('string'),
                new Assert\Length(36)
            ]),
            'startDate' => new Assert\Required([
                new Assert\NotBlank(),
                new Assert\DateTime('Y-m-d H:i:s')
            ])
        ]);
    }
}
