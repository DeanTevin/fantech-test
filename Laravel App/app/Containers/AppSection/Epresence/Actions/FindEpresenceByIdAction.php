<?php

namespace App\Containers\AppSection\Epresence\Actions;

use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\Tasks\FindEpresenceByIdTask;
use App\Containers\AppSection\Epresence\UI\API\Requests\FindEpresenceByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindEpresenceByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindEpresenceByIdTask $findEpresenceByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindEpresenceByIdRequest $request): Epresence
    {
        return $this->findEpresenceByIdTask->run($request->id);
    }
}
