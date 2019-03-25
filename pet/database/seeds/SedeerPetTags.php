<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SedeerPetTags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('pets_tags')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $date=Carbon::create(2018,11,12);
        for($i=1;$i<=5;$i++){
            $tag_id=rand(1,7);
            $pet_id=rand(1,10);

            $posts[]=[
                'pet_id'=>$pet_id,
                'tag_id'=>$tag_id,


            ];

        }
        DB::table('pets_tags')->insert($posts);
    }
}
