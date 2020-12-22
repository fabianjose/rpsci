@extends("layouts.landing")

@section("content-page")
@if ($count === 0)
	<h1 class="text-center text-ws"  style="padding: 8rem;">No se encontraron ofertas</h1>
@else
    <offers-filter :pagination="{{$pagination->toJson()}}" :fields="{{$fields}}" 
        query="{{$query}}" :lastpage="{{$last_page}}" :providers="{{$providers}}"
        :technologies = "{{$technologies}}"
        :speeds="{{json_encode($speeds)}}"
        :max_price="{{$max_price}}"
        :min_price="{{$min_price}}" >
    </offers-filter>
@endif

@stop
				