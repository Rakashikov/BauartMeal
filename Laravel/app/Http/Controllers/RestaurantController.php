<?php

namespace App\Http\Controllers;

use Auth;
use App\Restaurant;
use App\Order;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;   

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::latest()->get();

        return view('restaurants.index',[
            "restaurants" => $restaurants,
        ]);
    } //get

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }   //get

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'link'=>'required'
        ]);


        // dd($request->all());

        $restaurant_parse = self::parse($request->link, true);
        $restaurant_parse = json_decode($restaurant_parse, true);
        // $restaurant_parse = json_encode($restaurant_parse);
        
        $restaurant_parse = json_decode($restaurant_parse, true);
        $restaurant = Restaurant::create([
            'link' => $request->link,
            'name' => $restaurant_parse['name'],
            'image' => $restaurant_parse['logo']
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'rest_id' => $restaurant->id,
            'sum' => 0,
            'is_waiting' => 1
        ]);
   
        return redirect()->route('restaurants.index')
                        ->with('success','Restaurant created successfully.');
    } //post    

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $cards = self::parse($restaurant->link, false);
        $order = $restaurant->orders;
        // dd($restaurant);
        return view('cart',[
            "cards" => $cards,
            "order" => $order
        ]);
    } //get

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit',compact('restaurant'));
    } //get

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required'
        ]);
  
        $restaurant->update($request->all());
  
        return redirect()->route('restaurants.index')
                        ->with('success','Restaurant updated successfully');
    } //post

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
  
        return redirect()->route('restaurants.index')
                        ->with('success','Restaurant deleted successfully');
    } //delete

    public function parse (String $link, Bool $flag){
        $cards = Curl::to('http://127.0.0.1:3000/parser/get')
        ->withData( array( 'url' => $link, 'flag' => (bool)$flag ) )
        ->post();

        return json_encode($cards);;
    }
}
