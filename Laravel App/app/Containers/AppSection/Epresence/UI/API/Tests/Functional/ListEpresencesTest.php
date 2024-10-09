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
class ListEpresencesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/epresences';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testListEpresencesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        EpresenceFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListEpresencesByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     EpresenceFactory::new()->count(2)->create();
    //
    //     $response = $this->makeCall();
    //
    //     $response->assertStatus(403);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('message')
    //                 ->where('message', 'This action is unauthorized.')
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchEpresencesByFields(): void
    // {
    //     EpresenceFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $epresence = EpresenceFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($epresence->name))->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $epresence->name)
    //                 ->etc()
    //     );
    // }

    public function testSearchEpresencesByHashID(): void
    {
        $epresences = EpresenceFactory::new()->count(3)->create();
        $secondEpresence = $epresences[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondEpresence->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondEpresence->getHashedKey())
                    ->etc()
        );
    }
}
