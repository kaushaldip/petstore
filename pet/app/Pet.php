<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{

    protected $fillable = [
        'name', 'status', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
