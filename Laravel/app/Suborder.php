<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suborder extends Model
{
     protected $fillable = ['order_id', 'user_id', 'cost'];

 	public function user()
    {
      return $this->belongsTo(User::class);
    }
    
      public function order()
    {
      return $this->belongsTo(Order::class);
    }

    public function carts()
    {
      return $this->hasMany(Cart::class);
    }

    public function createCart($items){
      foreach ($items as $item) {
        Cart::create([
            'suborder_id' => $this -> id,
            'name' => $item['product_name'],
            'price' => $item['product_price'],
            'count' => $item['product_count'],
        ]);
        // echo($item['product_name']);
    }
    }
}
