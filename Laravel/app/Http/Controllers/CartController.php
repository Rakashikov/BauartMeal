<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $carts = Cart::latest()->paginate(5);
  
        return view('carts.index',compact('carts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'suborder_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'count'=>'required'
        ]);

        Cart::create($request->all());
   
        return redirect()->route('carts.index')
                        ->with('success','Cart created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('carts.show',compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('carts.edit',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'suborder_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'count'=>'required'
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('carts.index')
                        ->with('success','Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
         $cart->delete();
  
        return redirect()->route('carts.index')
                        ->with('success','Cart deleted successfully');
    }
}
