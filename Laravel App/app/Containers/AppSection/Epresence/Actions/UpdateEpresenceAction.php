<?php

namespace App\Containers\AppSection\Epresence\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Epresence\Data\Repositories\EpresenceRepository;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\Tasks\UpdateEpresenceTask;
use App\Containers\AppSection\Epresence\UI\API\Requests\UpdateEpresenceRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Spatie\Permission\Exceptions\UnauthorizedException;

class UpdateEpresenceAction extends ParentAction
{
    public function __construct(
        private readonly UpdateEpresenceTask $updateEpresenceTask,
        private readonly EpresenceRepository $epresenceRepository
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateEpresenceRequest $request): Epresence
    {
        $data = $request->sanitizeInput([
            "is_approved"
        ]);
        
        $validation = $this->epresenceRepository->with('user')->find($request->id);
        if($validation->user->npp_supervisor != auth()->user()->npp){
            throw new UnauthorizedException(403, "User is not valid supervisor");
        };

        return $this->updateEpresenceTask->run($data, $request->id);
    }
}
