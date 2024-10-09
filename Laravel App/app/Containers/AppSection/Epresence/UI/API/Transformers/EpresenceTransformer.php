<?php

namespace App\Containers\AppSection\Epresence\UI\API\Transformers;

use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class EpresenceTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Epresence $epresence): array
    {
        $response = [
            'object' => $epresence->getResourceKey(),
            'id' => $epresence->getHashedKey(),
            'waktu' => $epresence->waktu,
            'type' => $epresence->type,
            'is_approved' => $epresence->is_approved
        ];

        return $response;
    }
}
