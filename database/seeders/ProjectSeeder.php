<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(2, true);
            $project->description = $faker->text();
            $project->link_repository = $faker->sentences(3, true);
            $project->link_image = $faker->sentences(3, true);
            $project->developers = $faker->name();
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
