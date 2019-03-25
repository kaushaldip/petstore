<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Seedeertags extends Seeder
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
        DB::table('tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $tags=array(
            'cute',
            'small',
            'kitten',
            'puppy',
            'huge',
            'sale',
            'cheap'
        );
        $date=Carbon::create(2019,3,14);
        foreach ($tags as $tag){

            $posts[]=[
                'name'=>$tag,
                'created_at'=>clone($date),
                'updated_at'=>clone($date),

            ];
        }

        DB::table('tags')->insert($posts);
    }
}
