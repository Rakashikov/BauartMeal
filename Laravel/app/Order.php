<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
      protected $fillable = ['date', 'user_id', 'rest_id', 'sum', 'is_waiting'];

      public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function rest()
    {
      return $this->belongsTo(Restaurant::class);
    }

     public function suborders()
    {
      return $this->hasMany(Suborder::class);
    }
}
