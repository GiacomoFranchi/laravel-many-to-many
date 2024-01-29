<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 1; $i < 6; $i++){
            $project = new project();
            $project->title = $faker->sentence(5);
            $project->content = $faker->text(500);
            $project->slug = Str::slug($project->title);
            $project->save();
        }
    }
}
