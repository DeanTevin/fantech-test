<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationDefaultUsersSeeder_4 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateAdminAction $action): void
    {
        // Default Users (with their roles) ---------------------------------------------
        $userData = [
            'username' => config('appSection-authorization.username'),
            'email' => config('appSection-authorization.email'),
            'password' => config('appSection-authorization.admin_role'),
            'name' => config('appSection-authorization.name'),
            'npp' => config('appSection-authorization.npp'),
        ];

        $action->run($userData);
    }
}
