<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'booking-list',
            'booking-edit',
            'booking-approve',
            'booking-delete',
            'room-list',
            'room-create',
            'room-edit',
            'room-update',
            'room-delete',
            'null',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
