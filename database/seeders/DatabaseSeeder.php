<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::truncate();
        Category::truncate();
        Post::truncate();

        
        Post::factory(5)->create();
        // $user = User::factory(1)->create();
        $user = User::factory()->create();
        Post::factory(3)->create([
            "user_id" => $user->id,
            "category_id" => 1,
        ]);

        // Category::create([
        //     "name" => "Personal",
        //     "slug" => "personal"
        // ]);

        // $work  = Category::create([
        //     "name" => "Work",
        //     "slug" => "work"
        // ]);

        // Category::create([
        //     "name" => "Hobby",
        //     "slug" => "hobby"
        // ]);

        // Post::create([
        //     "title" => "Work post",
        //     "excerpt" => "some excerpt",
        //     "user_id" => $user[0]->id,
        //     "category_id" => $work->id,
        //     "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi volutpat at magna et rutrum. Sed interdum varius ligula, non efficitur felis laoreet vel. Nulla tristique purus vel nunc rutrum efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Prae",
        //     "slug" => "work-slug-1"

        // ]);

        // Post::create([
        //     "title" => "Work post",
        //     "excerpt" => "some another excerpt",
        //     "user_id" => $user[0]->id,
        //     "category_id" => $work->id,
        //     "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi volutpat at magna et rutrum. Sed interdum varius ligula, non efficitur felis laoreet vel. Nulla tristique purus vel nunc rutrum efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Prae",
        //     "slug" => "work-slug-2"

        // ]);
    }
}
