@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="card product text-left">

            
            <h1>{{$product->nombre}}</h1>
            <div class="row">
                <div class="col-sm-6 col-xs-12"></div>
                @if($product->extension)
                    <img src="{{url("/producto/images/$product->id.$product->extension")}}" class="product-avatar">
                    @endif
                <div class="col-sm-6 col-xs-12">
                <p>
                    <strong>Descripcion</strong>
                </p>
                <p>
                    {{$product->descripcion}}
                </p>
                <p>
                </p>
                </div>
            </div>
        </div>
    </div>
@endsection