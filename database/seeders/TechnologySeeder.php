<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [ 'CSS', 'Sass', 'JavaScript', 'React',  'Vue.js',  'Angular',  'Bootstrap',  'Node.js', 'Express.js',  'Django',  'Ruby on Rails',  'PHP',  'Laravel', 'TypeScript', ];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Technology::generateSlug($new_technology->name);
            $new_technology->save();
        }
    }
}
