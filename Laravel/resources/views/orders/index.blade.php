@extends('layouts.app')

@section('content')




<historymenu-component :orders="{{json_encode($res)}}" 
@if (auth()->check())
:isauth="{{auth()->check()}}"
    
@else
:isauth={{0}}
@endif
></historymenu-component>




@endsection