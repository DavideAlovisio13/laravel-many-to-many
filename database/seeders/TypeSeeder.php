<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['web_development_projects', 'app_development_projects', 'graphic_design_projects', 'seo_optimization_projects'];
        for ($index = 0; $index < count($types); $index++) {
            $newType = new Type();
            $newType->name = $types[$index];
            $newType->slug = Type::generateSlug($newType->name);
            $newType->save();
        }
    }
}
