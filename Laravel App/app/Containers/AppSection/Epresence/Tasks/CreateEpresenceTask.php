<?php

namespace App\Containers\AppSection\Epresence\Tasks;

use App\Containers\AppSection\Epresence\Data\Repositories\EpresenceRepository;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateEpresenceTask extends ParentTask
{
    public function __construct(
        protected readonly EpresenceRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Epresence
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            throw $e;
            throw new CreateResourceFailedException();
        }
    }
}
