<?php

namespace App\Containers\AppSection\Epresence\Actions;

use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\Tasks\CheckPresenceTask;
use App\Containers\AppSection\Epresence\Tasks\FindEpresenceByIdTask;
use App\Containers\AppSection\Epresence\UI\API\Requests\CheckPresenceRequest;
use App\Containers\AppSection\Epresence\UI\API\Requests\FindEpresenceByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CheckPresenceAction extends ParentAction
{
    public function __construct(
        private readonly CheckPresenceTask $checkPresenceTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(CheckPresenceRequest $request): mixed
    {
        $data = $request->sanitizeInput([
            "id_user"
        ]);

        return $this->checkPresenceTask->run($data);
    }
}
