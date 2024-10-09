<?php

namespace App\Containers\AppSection\Epresence\Tasks;

use App\Containers\AppSection\Epresence\Data\Repositories\EpresenceRepository;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindEpresenceByIdTask extends ParentTask
{
    public function __construct(
        protected readonly EpresenceRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Epresence
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
