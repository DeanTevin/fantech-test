<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Tasks\ListEpresencesTask;
use App\Containers\AppSection\Epresence\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * @group epresence
 * @group unit
 */
class ListEpresencesTaskTest extends UnitTestCase
{
    public function testListEpresences(): void
    {
        EpresenceFactory::new()->count(3)->create();

        $foundEpresences = app(ListEpresencesTask::class)->run();

        $this->assertCount(3, $foundEpresences);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundEpresences);
    }
}
