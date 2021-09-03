@extends('layouts.app')

@section('content')
<!-- <history-component></history-component>
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('restaurants.create') }}"> Create New Restaurant</a>
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
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->name }}</td>
            <td>{{ $restaurant->link }}</td>
            <td>
                <form action="{{ route('restaurants.destroy',$restaurant->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('restaurants.show',$restaurant->id) }}">Show</a>
                    <a class="btn btn-info" href="{{ route('restaurants.show',$restaurant->id) }}">Select</a>
                    <a class="btn btn-primary" href="{{ route('restaurants.edit',$restaurant->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    <br>
    <br> -->

<menu-component :restaurants="{{$restaurants}}" 
@if (auth()->check())
:isauth="{{auth()->check()}}"
    
@else
:isauth={{0}}
@endif
></menu-component>
@endsection