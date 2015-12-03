<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Yannis Weishaupt',
        	'email' => 'yannis@laravel.fr',
        	'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Franck',
        	'email' => 'franck@laravel.fr',
        	'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Alexis',
        	'email' => 'alexis@laravel.fr',
        	'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Brice Miclo',
        	'email' => 'brice@laravel.fr',
        	'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Germain',
        	'email' => 'germain@laravel.fr',
        	'password' => bcrypt('123456'),
        ]);
    }
}
