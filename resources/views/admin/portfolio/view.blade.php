@extends('layouts.master') 
@section('content')
<div class="container">
    <h1 class="display-2">{{$portfolio->title}}</h1>
    <div class="row">
        <div class="col-md-8"><img class="img-fluid" src="/storage/portfolio_images/{{$portfolio->img}}"></div>
        <div class="col-md-4">
            <h1 class="text-*-left">{{$portfolio->title}}</h1>
            <p>{!!$portfolio->desc!!}</p>
        </div>
    </div>
</div>
@endsection