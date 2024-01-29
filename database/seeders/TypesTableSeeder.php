<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['approvato','disapprovato','valutazione'];
        foreach($types as $type){
            $newType = new Type();
            $newType->tipologia = $type;
            $newType->slug = Str::slug($type);
            $newType->save();
        }
    }
}
