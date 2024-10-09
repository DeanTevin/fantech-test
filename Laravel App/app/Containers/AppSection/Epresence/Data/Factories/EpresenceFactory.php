<?php

namespace App\Containers\AppSection\Epresence\Data\Factories;

use App\Containers\AppSection\Epresence\Data\Enums\EpresenceTypeEnums;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of EpresenceFactory
 *
 * @extends ParentFactory<TModel>
 */
class EpresenceFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Epresence::class;

    public function definition(): array
    {
        return [
            'id_users' => function() {
               return User::factory(1)->create()->first()->id;
            },
            'type' => $this->faker->randomElement(["in","out"]),
            'is_approved' => $this->faker->boolean(),
            'waktu' => now()
        ];
    }
}
