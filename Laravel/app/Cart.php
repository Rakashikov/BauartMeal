<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['suborder_id', 'name', 'price', 'count'];

    public function suborder()
    {
      return $this->belongsTo(Suborder::class);
    }
}
