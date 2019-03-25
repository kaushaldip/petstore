<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
class SedeerMedias extends Seeder
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
        DB::table('medias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $faker=Factory::create();
        $date=Carbon::create(2018,11,12);

        for($i=1;$i<=20;$i++){


            $posts[]=[
                'photourl'=>$faker->imageUrl,
                'created_at'=>clone($date),
                'updated_at'=>clone($date),

            ];

        }
        DB::table('medias')->insert($posts);
    }
}
