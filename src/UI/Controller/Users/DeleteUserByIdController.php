<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\UI\Controller\BaseController;
use App\Users\Application\Command\DeleteUserById\DeleteUserByIdCommand;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class DeleteUserByIdController extends BaseController
{
    public function __invoke(string $id): Response
    {
        $this->dispatch(new DeleteUserByIdCommand($id));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
