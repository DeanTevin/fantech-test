<?php

namespace App\Containers\AppSection\Epresence\Data\Repositories;

use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class EpresenceRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

    public function model(): string
    {
        return Epresence::class;
    }
}
