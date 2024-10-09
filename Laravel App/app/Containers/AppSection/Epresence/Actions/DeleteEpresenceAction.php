<?php

namespace App\Containers\AppSection\Epresence\Actions;

use App\Containers\AppSection\Epresence\Tasks\DeleteEpresenceTask;
use App\Containers\AppSection\Epresence\UI\API\Requests\DeleteEpresenceRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteEpresenceAction extends ParentAction
{
    public function __construct(
        private readonly DeleteEpresenceTask $deleteEpresenceTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteEpresenceRequest $request): int
    {
        return $this->deleteEpresenceTask->run($request->id);
    }
}
