<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions = [
        //     'booking-list',
        //     'booking-edit',
        //     'booking-approve',
        //     'booking-delete',
        //     'room-list',
        //     'room-create',
        //     'room-edit',
        //     'room-update',
        //     'room-delete',
        // ];

        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }

        DB::table('permissions')->insert([
            [
                'route_name' => 'admin.rooms.index',
                'title' => 'Rooms'
            ],
            [
                'route_name' => 'admin.rooms.create',
                'title' => 'Create Room'
            ],
            [
                'route_name' => 'admin.rooms.edit',
                'title' => 'Edit Room'
            ],
            [
                'route_name' => 'admin.rooms.destroy',
                'title' => 'Delete Room'
            ],
            [
                'route_name' => 'admin.bookings.index',
                'title' => 'Bookings'
            ],
            [
                'route_name' => 'admin.bookings.edit',
                'title' => 'Edit Booking'
            ],
            [
                'route_name' => 'admin.bookings.destroy',
                'title' => 'Delete Booking'
            ]
        ]);

    }
}
