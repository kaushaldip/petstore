<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
class SeedeerPets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('pets')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $faker=Factory::create();
        $date=Carbon::create(2019,3,14);
        $status=array( 'pending', 'available','sold' );
        $randIndex = array_rand($status);

        for($i=1;$i<=10;$i++){
            $date->addDays($i);
            $category_id=rand(1,7);
            $posts[]=[
                'name'=>$faker->name,
                'category_id'=>$category_id,
                'status'=>$status[$randIndex],
                'created_at'=>clone($date),
                'updated_at'=>clone($date),
                'created_at'=>clone($date),
                'updated_at'=>clone($date),

            ];

        }
        DB::table('pets')->insert($posts);

    }
}
