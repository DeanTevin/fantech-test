<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\Tests\UnitTestCase;

/**
 * @group epresence
 * @group unit
 */
class EpresenceFactoryTest extends UnitTestCase
{
    public function testCreateEpresence(): void
    {
        $epresence = EpresenceFactory::new()->make();

        $this->assertInstanceOf(Epresence::class, $epresence);
    }
}
