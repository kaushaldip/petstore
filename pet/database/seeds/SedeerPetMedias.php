<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SedeerPetMedias extends Seeder
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
        DB::table('pets_medias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $date=Carbon::create(2018,11,12);

        for($i=1;$i<=5;$i++){
            $media_id=rand(1,20);
            $pet_id=rand(1,10);

            $posts[]=[
                'pet_id'=>$pet_id,
                'media_id'=>$media_id,


            ];

        }
        DB::table('pets_medias')->insert($posts);
    }
}
