<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class OrderSeedeer extends Seeder
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
        DB::table('orders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $date=Carbon::create(2019,3,14);
        $status=array( 'placed', 'approved','delivered' );

        $date1=Carbon::create(2018,11,12);
        for($i=1;$i<=10;$i++){
            $randIndex = array_rand($status);
            $date->addDays($i);
            $user_id=rand(1,10);
            $pet_id=rand(1,10);
            $quantity=rand(1,5);
            $posts[]=[
                'pet_id'=>$pet_id,
                'user_id'=>$user_id,
                'quantity'=>$quantity,
                'status'=>$status[$randIndex],
                'shipDate'=>clone($date),
                'complete'=>(bool)random_int(0, 1),
                'created_at'=>clone($date1),
                'updated_at'=>clone($date1),

            ];

        }
        DB::table('orders')->insert($posts);
    }
}
