<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Tasks\UpdateEpresenceTask;
use App\Containers\AppSection\Epresence\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;

/**
 * @group epresence
 * @group unit
 */
class UpdateEpresenceTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateEpresence(): void
    {
        $epresence = EpresenceFactory::new()->create([
            // 'some_field' => 'new_field_value',
            "is_approved" => false
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
            "is_approved" => true
        ];

        $updatedEpresence = app(UpdateEpresenceTask::class)->run($data, $epresence->id);

        $this->assertEquals($epresence->id, $updatedEpresence->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedEpresence->some_field);
    }

    public function testUpdateEpresenceWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateEpresenceTask::class)->run([], $noneExistingId);
    }
}
