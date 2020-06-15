<?php

use Illuminate\Database\Seeder;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' =>'Pablo',
            'email' =>'pablo@ada.es',
            'password'=>bcrypt('laravel'),
        ]);
    }
}
