<?php

namespace App\Ship\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use App\Ship\Seeders\Seeder\ActivityLogging\LogLevelSeeder;

class SeedDeploymentData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by Apiato
     * This is a special seeder which can be called by "apiato:seed-deploy" command
     * It is useful for seeding data for initial deployment.
     */
    public function run(): void
    {
        // Create data for live deployment here
    }
}
