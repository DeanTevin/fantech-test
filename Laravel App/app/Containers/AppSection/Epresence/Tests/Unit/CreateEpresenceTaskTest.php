<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\Tasks\CreateEpresenceTask;
use App\Containers\AppSection\Epresence\Tests\UnitTestCase;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Support\Str;

use App\Ship\Exceptions\CreateResourceFailedException;

/**
 * @group epresence
 * @group unit
 */
class CreateEpresenceTaskTest extends UnitTestCase
{
    public function testCreateEpresence(): void
    {
        $user = User::factory(1)->create()->first()->id;

        $data = [
            'type'=> 'in',
            'waktu'=> now(),
            'is_approved' => false,
            'id_users' => $user
        ];

        $epresence = app(CreateEpresenceTask::class)->run($data);

        $this->assertModelExists($epresence);
        $this->assertInstanceOf(Epresence::class, $epresence);
        $this->assertSame($data['id_users'], $epresence->id_users);
    }

    // TODO TEST
    // public function testCreateEpresenceWithInvalidData(): void
    // {
    //     $this->expectException(CreateResourceFailedException::class);
    //
    //     $data = [
    //         // put some invalid data here
    //         // 'invalid' => 'data',
    //     ];
    //
    //     app(CreateEpresenceTask::class)->run($data);
    // }
}
