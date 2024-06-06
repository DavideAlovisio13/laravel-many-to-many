<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for( $i = 0; $i < 10; $i++ ) {
            $new_project = new Project();
            $new_project->name = $faker->name;
            $new_project->title = $faker->sentence(3);
            $new_project->description = $faker->text();
            $new_project->create_at = $faker->dateTime();
            $new_project->slug = Project::generateSlug($new_project->title);
            $new_project->save();

        }
    }
}
