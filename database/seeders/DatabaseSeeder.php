<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Usuario;
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
        Usuario::factory()->times(15)->create();
        Post::factory()->times(8)->create()->each(function($post){
            $post->usuarios()->sync(
                Usuario::all()->random(3)
            );
        });
        // \App\Models\User::factory(10)->create();
    }
}
