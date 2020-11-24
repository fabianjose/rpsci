@extends("layouts.landing")

@section("content-page")

    <offers-filter :pagination="{{$pagination->toJson()}}" :fields="{{$fields}}" 
        query="{{$query}}" :lastpage="{{$last_page}}" :providers="{{$providers}}" >
    </offers-filter>

@stop
