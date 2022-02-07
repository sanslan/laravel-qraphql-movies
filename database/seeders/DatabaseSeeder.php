<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
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

        $this->call(CategorySeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(MovieSeeder::class);

        Movie::all()->each(function ($movie) {
            $movie->category_id = mt_rand(1,5);
            $movie->save();
            $arr = range(1, 20);
            $random_actor_numbers = [];
            for ($i = 0; $i < mt_rand(1,5); $i++){
                $random_actor_numbers[] = $arr[array_rand($arr)];
            }
            $actors = Actor::whereIn('id',array_unique($random_actor_numbers))->get();
            $movie->actors()->saveMany($actors);
        });





    }
}
