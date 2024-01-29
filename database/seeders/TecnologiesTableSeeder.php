<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TecnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tecnologies = ['php','js','html','laravel'];
        foreach($tecnologies as $tecnology){
            $newTecnology = new Tecnology();
            $newTecnology->tecnologia = $tecnology;
            $newTecnology->slug = Str::slug($tecnology);
            $newTecnology->hex_color = $faker->hexColor();
            $newTecnology->save();
        }
    }
}
