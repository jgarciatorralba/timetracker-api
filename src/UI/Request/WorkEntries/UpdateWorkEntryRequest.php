<?php

declare(strict_types=1);

namespace App\UI\Request\WorkEntries;

use App\UI\Request\AbstractRequest;
use DateTimeImmutable;
use Exception;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

final class UpdateWorkEntryRequest extends AbstractRequest
{
    protected function validationRules(): Assert\Collection
    {
        return new Assert\Collection([
            'id' => new Assert\Required([
                new Assert\NotBlank(),
                new Assert\Type('string'),
                new Assert\Length(36)
            ]),
            'startDate' => new Assert\Optional([
                new Assert\NotBlank(),
                new Assert\DateTime('Y-m-d H:i:s')
            ]),
            'endDate' => new Assert\Optional([
                new Assert\DateTime('Y-m-d H:i:s'),
                new Assert\Callback(['callback' => [$this, 'validateEndDate']])
            ])
        ]);
    }

    public function validateEndDate(?string $endDate, ExecutionContextInterface $context): void
    {
        if (empty($this->payload()['startDate']) || empty($endDate)) {
            return;
        }

        try {
            $startDate = new DateTimeImmutable($this->payload()['startDate']);
            $endDate = new DateTimeImmutable($endDate);

            if ($endDate < $startDate) {
                $context->buildViolation("This value should not be lower than 'startDate'.")
                    ->addViolation();
            }
        } catch (Exception $e) {
        }
    }
}
