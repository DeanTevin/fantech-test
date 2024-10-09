<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Tasks\FindEpresenceByIdTask;
use App\Containers\AppSection\Epresence\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;

/**
 * @group epresence
 * @group unit
 */
class FindEpresenceByIdTaskTest extends UnitTestCase
{
    public function testFindEpresenceById(): void
    {
        $epresence = EpresenceFactory::new()->createOne();

        $foundEpresence = app(FindEpresenceByIdTask::class)->run($epresence->id);

        $this->assertEquals($epresence->id, $foundEpresence->id);
    }

    public function testFindEpresenceWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindEpresenceByIdTask::class)->run($noneExistingId);
    }
}
