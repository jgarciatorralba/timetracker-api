<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\Shared\Domain\ValueObject\Uuid;
use App\UI\Controller\BaseController;
use App\UI\Request\Users\CreateUserRequest;
use App\Users\Application\Command\CreateUser\CreateUserCommand;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CreateUserController extends BaseController
{
    public function __invoke(CreateUserRequest $request): Response
    {
        $data = $request->payload();

        $id = Uuid::random()->value();

        $this->dispatch(new CreateUserCommand(
            id: $id,
            name: $data['name'],
            email: $data['email']
        ));

        return new JsonResponse(null, Response::HTTP_CREATED);
    }
}
