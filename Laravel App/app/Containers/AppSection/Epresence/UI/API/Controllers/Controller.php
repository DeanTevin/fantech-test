<?php

namespace App\Containers\AppSection\Epresence\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Epresence\Actions\CheckPresenceAction;
use App\Containers\AppSection\Epresence\Actions\CreateEpresenceAction;
use App\Containers\AppSection\Epresence\Actions\DeleteEpresenceAction;
use App\Containers\AppSection\Epresence\Actions\FindEpresenceByIdAction;
use App\Containers\AppSection\Epresence\Actions\ListEpresencesAction;
use App\Containers\AppSection\Epresence\Actions\UpdateEpresenceAction;
use App\Containers\AppSection\Epresence\UI\API\Requests\CheckPresenceRequest;
use App\Containers\AppSection\Epresence\UI\API\Requests\CreateEpresenceRequest;
use App\Containers\AppSection\Epresence\UI\API\Requests\DeleteEpresenceRequest;
use App\Containers\AppSection\Epresence\UI\API\Requests\FindEpresenceByIdRequest;
use App\Containers\AppSection\Epresence\UI\API\Requests\ListEpresencesRequest;
use App\Containers\AppSection\Epresence\UI\API\Requests\UpdateEpresenceRequest;
use App\Containers\AppSection\Epresence\UI\API\Transformers\CheckPresenceTransformer;
use App\Containers\AppSection\Epresence\UI\API\Transformers\EpresenceTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    public function __construct(
        private readonly CreateEpresenceAction $createEpresenceAction,
        private readonly UpdateEpresenceAction $updateEpresenceAction,
        private readonly FindEpresenceByIdAction $findEpresenceByIdAction,
        private readonly ListEpresencesAction $listEpresencesAction,
        private readonly DeleteEpresenceAction $deleteEpresenceAction,
        private readonly CheckPresenceAction $checkPresenceAction,
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function createEpresence(CreateEpresenceRequest $request): JsonResponse
    {
        $epresence = $this->createEpresenceAction->run($request);

        return $this->created($this->transform($epresence, EpresenceTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findEpresenceById(FindEpresenceByIdRequest $request): array
    {
        $epresence = $this->findEpresenceByIdAction->run($request);

        return $this->transform($epresence, EpresenceTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function listEpresences(ListEpresencesRequest $request): array
    {
        $epresences = $this->listEpresencesAction->run($request);

        return $this->transform($epresences, EpresenceTransformer::class);
    }

    /**
     * @throws IncorrectIdException
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function updateEpresence(UpdateEpresenceRequest $request): array
    {
        $epresence = $this->updateEpresenceAction->run($request);

        return $this->transform($epresence, EpresenceTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function checkPresence(CheckPresenceRequest $request): array
    {
        $epresence = $this->checkPresenceAction->run($request);

        return CheckPresenceTransformer::CustomTransformer($epresence);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteEpresence(DeleteEpresenceRequest $request): JsonResponse
    {
        $this->deleteEpresenceAction->run($request);

        return $this->noContent();
    }
}
