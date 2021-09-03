@extends('layouts.app')

@section('content')

<cart-component :parseData='{{ json_decode($cards) }}' :order='{{$order}}'></cart-component>
@endsection

