<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //фабрика создает 10 постов с наполнением lorem ipsum
        factory(Post::class, 10)->create();
    }
}
