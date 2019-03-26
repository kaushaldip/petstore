<?php
namespace App;
use \Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = [
        'status','quantity','pet_id','user_id','shipDate'
    ];

}