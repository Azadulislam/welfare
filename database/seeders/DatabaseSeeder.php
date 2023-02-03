<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AllMember;
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
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
        $user = array(
            ['name' => 'Test user', 'username' => 'user@gmail.com', 'password' => Hash::make('user')],
        );

        \App\Models\User::insert($user);
        $this->call(StatusesSeeder::class);
        $this->call(AllMemberSeeder::class);

    }
}
