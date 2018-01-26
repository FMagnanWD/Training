<?php

use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Trading",
        ]);
        DB::table('categories')->insert([
            'name' => "Investissement Immobilier",
        ]);
        DB::table('categories')->insert([
            'name' => "Bricolage",
        ]);
    }
}
