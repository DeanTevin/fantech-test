<?php

namespace App\Containers\AppSection\Epresence\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Epresence\Data\Repositories\EpresenceRepository;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\Tasks\CreateEpresenceTask;
use App\Containers\AppSection\Epresence\UI\API\Requests\CreateEpresenceRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateEpresenceAction extends ParentAction
{
    public function __construct(
        private readonly CreateEpresenceTask $createEpresenceTask,
        private readonly EpresenceRepository $epresenceRepository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateEpresenceRequest $request): Epresence
    {
        $data = $request->sanitizeInput([
            "type",
            "waktu"
        ]);

        $data["id_users"] = auth()->user()->id;
        $data["is_approved"] = false;

        $validate = $this->epresenceRepository->scopeQuery(function ($query) use ($data) {
            return $query->where('type', $data['type'])
                ->where('id_users', $data['id_users'])
                ->whereDate('waktu', date('Y-m-d', strtotime($data['waktu'])));
        })->first();

        if(!empty($validate)){
            throw new ValidationFailedException("Already mark ". $data["type"] ." presence for today");
        }

        return $this->createEpresenceTask->run($data);
    }
}
