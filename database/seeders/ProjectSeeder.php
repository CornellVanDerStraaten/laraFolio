<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 7 Projecten met random data genereren
        $faker = Faker\Factory::create('nl_NL');

        for($i = 0; $i < 5; $i++) {
            $project = new Project();
            $project->title         = $faker->text(20);
            $project->keywords      = $faker->text(25);
            $project->content       = $faker->text(200);
            $project->slug          = $faker->slug;
            $project->live_link     = $faker->url;
            $project->github_link   = $faker->url;
            $project->developers    = $faker->name();
            $project->vormgevers    = $faker->name();
            $project->taal          = 'Nederlands';
            $project->active        = 1;
            $project->published_date = $faker->date('Y-m-d', 'now');
            $project->thumbnail_image = 'https://via.placeholder.com/300';
            $project->save();
        }
    }
}
