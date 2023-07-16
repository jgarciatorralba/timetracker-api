<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use DateTimeImmutable;
use App\Shared\Domain\ValueObject\Uuid;
use App\UI\Controller\ApiController;
use App\UI\Request\CreateUserRequest;
use App\Users\Application\Command\CreateUser\CreateUserCommand;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CreateUserController extends ApiController
{
    public function __invoke(CreateUserRequest $request): Response
    {
        $data = $request->payload();

        $id = Uuid::random()->value();

        $this->dispatch(new CreateUserCommand(
            id: $id,
            name: $data['name'],
            email: $data['email'],
            createdAt: new DateTimeImmutable(),
            updatedAt: new DateTimeImmutable(),
            deletedAt: null
        ));
        
        return new JsonResponse(null, Response::HTTP_CREATED);
    }
}
