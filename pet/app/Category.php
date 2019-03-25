<?php
/**
 * Created by PhpStorm.
 * User: kds
 * Date: 26/3/19
 * Time: 8:06 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function pets(){
        return $this->hasMany(Pet::class);
    }
}