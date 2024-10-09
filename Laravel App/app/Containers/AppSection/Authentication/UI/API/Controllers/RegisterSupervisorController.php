<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\RegisterSupervisorAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterSupervisorRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class RegisterSupervisorController extends ApiController
{
    public function __invoke(RegisterSupervisorRequest $request, RegisterSupervisorAction $action): JsonResponse
    {
        $user = $action->transactionalRun($request);

        return response()->json($this->transform($user, UserTransformer::class),201);
    }
}
