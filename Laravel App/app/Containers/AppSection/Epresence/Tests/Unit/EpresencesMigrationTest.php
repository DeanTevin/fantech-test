<?php

namespace App\Containers\AppSection\Epresence\Tests\Unit;

use App\Containers\AppSection\Epresence\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * @group epresence
 * @group unit
 */
class EpresencesMigrationTest extends UnitTestCase
{
    public function test_epresences_table_has_expected_columns(): void
    {
        $columns = [
            'id' => 'bigint',
            'id_users' => 'guid',
            'type' => 'string',
            'is_approved' => 'boolean',
            'waktu'=>'datetime',
        ];

        $this->assertDatabaseTable('epresences', $columns);
    }
}
