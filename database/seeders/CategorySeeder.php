<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Одежда',
        ]);
        DB::table('categories')->insert([
            'name' => 'Электроника',
        ]); 
        DB::table('categories')->insert([
            'name' => 'Недвижимость',
        ]); 
        DB::table('categories')->insert([
            'name' => 'Животные',
        ]);
        DB::table('categories')->insert([
            'name' => 'Авто',
        ]);
        DB::table('categories')->insert([
            'name' => 'Украшения',
        ]); 
        DB::table('categories')->insert([
            'name' => 'Дом и ремонт',
        ]);
        DB::table('categories')->insert([
            'name' => 'Дети',
        ]);
        DB::table('categories')->insert([
            'name' => 'Спорт',
        ]);
        DB::table('categories')->insert([
            'name' => 'Услуги',
        ]); 
        DB::table('categories')->insert([
            'name' => 'Здоровье',
        ]);                                                                    
    }
}
