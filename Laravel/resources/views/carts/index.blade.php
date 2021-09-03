@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 5.8 CRUD Example from scratch - ItSolutionStuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('carts.create') }}"> Create New Cart</a>
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
        <th>Suborder_id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Count</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($carts as $cart)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $cart->suborder_id }}</td>
        <td>{{ $cart->name }}</td>
        <td>{{ $cart->price }}</td>
        <td>{{ $cart->count }}</td>

        <td>
            <form action="{{ route('carts.destroy',$cart->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('carts.show',$cart->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('carts.edit',$cart->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $carts->links() !!}

@endsection