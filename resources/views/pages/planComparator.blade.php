@extends("layouts.landing")

@section("content-page")

    <offers-filter :pagination="{{$pagination->toJson()}}" :fields="{{$fields}}" 
        query="{{$query}}" :lastpage="{{$last_page}}" :providers="{{$providers}}"
        :technologies = "{{$technologies}}"
        :speeds="{{json_encode($speeds)}}"
        :max_price="{{$max_price}}"
        :min_price="{{$min_price}}" >
    </offers-filter>

@stop
				