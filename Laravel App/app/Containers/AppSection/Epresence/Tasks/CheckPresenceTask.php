<?php

namespace App\Containers\AppSection\Epresence\Tasks;

use App\Containers\AppSection\Epresence\Data\Repositories\EpresenceRepository;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CheckPresenceTask extends ParentTask
{
    public function __construct(
        protected readonly EpresenceRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(array $data): mixed
    {
        try {
            $get = $this->repository->with('user')->scopeQuery(function ($query) use ($data) {
                    return $query->where('id_users', $data['id_user']);
                })->all();
            return $get;
        } catch (Exception $e) {
            throw new NotFoundException();
        }
    }
}
