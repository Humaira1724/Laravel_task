@extends('layouts.app')
@section('title','Home page')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">
        @foreach($sliders as $key =>$sliderItem)
        <div class="carousel-item {{$key == 0 ? 'active':''}}">
            @if($sliderItem->image)
            <img src="{{asset($sliderItem->image)}}" class="d-block w-100" alt="...">
            @endif

            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1 style="color:black">
                        {{$sliderItem->title}}
                    </h1>
                    <p style="color:black">{{$sliderItem->description}}</p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="row">
@foreach($products as $key =>$productItem)

    <div class="col-sm-4">
        <div class="card m-2">
            <div class="card-body">
            @if($productItem->image)
            <img src="{{asset($productItem->image)}}"  style="width:50px;height:50px" alt="img">
        
            @endif
                <h5 class="card-title"> {{$productItem->name}}</h5>               
                <h3>Rs.{{$productItem->selling_price}}</h3>
                <a href="<?php echo url('')?>/addcart/{{$productItem->id}}" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>

@endforeach
</div>
@endsection