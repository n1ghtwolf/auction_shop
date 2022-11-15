<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    private static array $names = [
        'Антиквариат',
        'Недвижимость',
        'Заброшенный гараж'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::$names = array_map(function ($name) {
            return ['name' => $name];
        }, self::$names);

        DB::table('auction_category')->insert(self::$names);
    }
}
