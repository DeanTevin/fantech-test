<?php

namespace App\Containers\AppSection\Epresence\UI\API\Tests\Functional;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\UI\API\Tests\ApiTestCase;

/**
 * @group epresence
 * @group api
 */
class DeleteEpresenceTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/epresences/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingEpresence(): void
    {
        $epresence = EpresenceFactory::new()->createOne();

        $response = $this->injectId($epresence->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingEpresence(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteEpresence(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $epresence = EpresenceFactory::new()->createOne();
    //
    //     $response = $this->injectId($epresence->id)->makeCall();
    //
    //     $response->assertStatus(403);
    // }
}
