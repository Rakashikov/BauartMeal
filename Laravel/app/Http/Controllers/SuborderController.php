<?php

namespace App\Http\Controllers;

use Auth;
use App\Suborder;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\SuborderRequest;

class SuborderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $suborders = Suborder::latest()->paginate(5);
  
        return view('suborders.index',compact('suborders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suborders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuborderRequest $request)
    {
        $suborder = Suborder::create([
            'order_id' => $request -> order_id,
            'user_id' => Auth::id(),
            'cost' => $request -> cost
        ]);

        $suborder->order->sum += $request->cost;
        $suborder->order->save();

        $suborder->createCart($request->items);

        return redirect()->route('suborders.index')
                        ->with('success','Suborder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suborder  $suborder
     * @return \Illuminate\Http\Response
     */
    public function show(Suborder $suborder)
    {
        $user = Suborder::pluck('user_id');
        $cost = Suborder::pluck('cost');


        return view('suborders.show',compact('suborder'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suborder  $suborder
     * @return \Illuminate\Http\Response
     */
    public function edit(Suborder $suborder)
    {
        return view('suborders.edit',compact('suborder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suborder  $suborder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suborder $suborder)
    {
         $request->validate([
            'order_id' => 'required',
            'user_id' => 'required',
            'cost' => 'required'
        ]);
  
        $suborder->update($request->all());
  
        return redirect()->route('suborders.index')
                        ->with('success','Suborder updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suborder  $suborder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suborder $suborder)
    {
        $suborder->delete();
  
        return redirect()->route('suborders.index')
                        ->with('success','Suborder deleted successfully');
    }
}
