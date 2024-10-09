<?php

namespace App\Containers\AppSection\Epresence\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Epresence\Tasks\ListEpresencesTask;
use App\Containers\AppSection\Epresence\UI\API\Requests\ListEpresencesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListEpresencesAction extends ParentAction
{
    public function __construct(
        private readonly ListEpresencesTask $listEpresencesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListEpresencesRequest $request): mixed
    {
        return $this->listEpresencesTask->run();
    }
}
