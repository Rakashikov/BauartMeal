@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('suborders.create') }}"> Create New Suborder</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Order_id</th>
            <th>User_id</th>
            <th>Cost</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($suborders as $suborder)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $suborder->order_id }}</td>
            <td>{{ $suborder->user_id }}</td>
            <td>{{ $suborder->cost }}</td>
            <td>
                <form action="{{ route('suborders.destroy',$suborder->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('suborders.show',$suborder->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('suborders.edit',$suborder->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $suborders->links() !!}
      
@endsection