<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(
            function ($user) {
                $user->posts()->saveMany(factory(Post::class, 1)->make(['user_id' => NULL]));
            }
        );
    }
}
