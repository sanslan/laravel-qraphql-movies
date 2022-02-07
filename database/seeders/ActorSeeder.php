<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Actor::truncate();
        Schema::enableForeignKeyConstraints();
        Actor::factory(20)->create();
    }
}
