<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AllMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         User::factory(10)->create();

//         User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
        $user = array(
            ['name' => 'Test user', 'username' => 'user@gmail.com', 'password' => Hash::make('user')],
        );


        $authorities = [
            ['name' => 'Create User'],
            ['name' => 'Dependant'],
            ['name' => 'Single independent'],
        ];
        \App\Models\Authorities::insert($authorities);

        User::insert($user);
        $this->call(StatusesSeeder::class);
        $this->call(AllMemberSeeder::class);

    }
}
