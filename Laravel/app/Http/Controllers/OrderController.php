<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use stdClass;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order = DB::table('orders')
        //         ->join('suborders', 'suborders.order_id', '=', 'orders.id')
        //         ->select('orders.*' , 'suborder.*')
        //         ->join('carts', 'suborder_id', '=', 'suborders.id')
        //         ->select('orders.*','suborders.*','carts.*')
        //         ->get();
        $orders = Order::latest()->get();
        $res = [];
        foreach ($orders as $order_key => $order) {
            if($order->user_id == Auth::id()){
            $tmp_order = new stdClass;
            $tmp_suborder_list = [];
            $tmp_order->id = $order -> id;
            $tmp_order->rest = $order->rest->name;
            $tmp_order->name = $order -> user -> login;
            $tmp_order->sum = $order -> sum;
            $tmp_order->is_waiting = $order -> is_waiting;
            $tmp_order->created_at = $order -> created_at -> toDateString();
            foreach ($order->suborders as $suborder_key => $suborder) {
                $tmp_suborder = new stdClass;
                $tmp_item_list = [];
                $tmp_suborder->user = $suborder->user->login;
                $tmp_suborder->price = $suborder->cost;
                foreach ($suborder->carts as $cart_key => $cart) {
                    $tmp_item = new stdClass;
                    $tmp_item->name = $cart->name;
                    $tmp_item->price = $cart->price;
                    $tmp_item->count = $cart->count;
                    $tmp_item_list[$cart_key] = $tmp_item;
                }
                $tmp_suborder->items = $tmp_item_list;
                $tmp_suborder_list[$suborder_key] = $tmp_suborder;
            }
            $tmp_order->suborders = $tmp_suborder_list;
            $res[$order_key] = $tmp_order;
        }
        }
        return view('orders.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
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
            'user_id' => 'required',
            'rest_id' => 'required',
            'sum' => 'required',
            'is_waiting' => 'required'
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
     

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'is_waiting' => 'required',
            'order_id' => 'required'
        ]);

        Order::find($request -> order_id)->update([
            'is_waiting' => $request->is_waiting
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
