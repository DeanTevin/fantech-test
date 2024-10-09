<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Tasks\DeleteEpresenceTask;
use App\Containers\AppSection\Epresence\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;

/**
 * @group epresence
 * @group unit
 */
class DeleteEpresenceTaskTest extends UnitTestCase
{
    public function testDeleteEpresence(): void
    {
        $this->markTestSkipped('Not in Scope.');
        $epresence = EpresenceFactory::new()->createOne();

        $result = app(DeleteEpresenceTask::class)->run($epresence->id);

        $this->assertEquals(1, $result);
    }

    public function testDeleteEpresenceWithInvalidId(): void
    {
        $this->markTestSkipped('Not in Scope');
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteEpresenceTask::class)->run($noneExistingId);
    }
}
