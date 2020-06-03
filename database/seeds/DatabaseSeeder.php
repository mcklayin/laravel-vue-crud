<?php

use App\Domain\Team\Models\Team;
use App\Domain\Player\Models\Player;
use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create user
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10)
        ]);

        factory(Team::class, 5)->create()->each(function ($team) {
            $team->players()->saveMany(factory(Player::class, 3)->make());
        });
    }
}
