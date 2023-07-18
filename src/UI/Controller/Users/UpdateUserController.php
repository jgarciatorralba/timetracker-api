<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\UI\Controller\BaseController;
use App\UI\Request\UpdateUserRequest;
use App\Users\Application\Command\UpdateUser\UpdateUserCommand;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UpdateUserController extends BaseController
{
    public function __invoke(UpdateUserRequest $request): Response
    {
        $data = $request->payload();

        $this->dispatch(new UpdateUserCommand(
            id: $data['id'],
            name: $data['name'] ?? null,
            email: $data['email'] ?? null,
            updatedAt: new DateTimeImmutable()
        ));
        
        return new JsonResponse(null, Response::HTTP_OK);
    }
}
