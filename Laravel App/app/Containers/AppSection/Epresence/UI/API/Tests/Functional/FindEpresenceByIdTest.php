<?php

namespace App\Containers\AppSection\Epresence\UI\API\Tests\Functional;

use App\Containers\AppSection\Epresence\Data\Factories\EpresenceFactory;
use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Containers\AppSection\Epresence\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * @group epresence
 * @group api
 */
class FindEpresenceByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/epresences/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindEpresence(): void
    {
        $epresence = EpresenceFactory::new()->createOne();

        $response = $this->injectId($epresence->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($epresence->id))
                    ->etc()
        );
    }

    public function testFindNonExistingEpresence(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredEpresenceResponse(): void
    {
        $epresence = EpresenceFactory::new()->createOne();

        $response = $this->injectId($epresence->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $epresence->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindEpresenceWithRelation(): void
    // {
    //     $epresence = EpresenceFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($epresence->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $epresence->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
