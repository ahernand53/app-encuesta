<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\User::class, 5)->create();
        factory(\App\Admin::class, 1)->create();
        /* DB::table('types')->insert(
            [
                'name' => 'seleccion multiple',
                'max_add' => 10
            ]
        );
        DB::table('types')->insert(
            [
                'name' => 'seleccion unica',
                'max_add' => 10
            ]
        );
        DB::table('types')->insert(
            [
                'name' => 'texto corto',
                'max_add' => 1
            ]
        ); */

    }
}
