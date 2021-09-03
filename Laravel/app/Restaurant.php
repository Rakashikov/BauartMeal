<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'link', 'image'];

     public function orders()
    {
      return $this->hasMany(Order::class, 'rest_id','id');
    }
}
