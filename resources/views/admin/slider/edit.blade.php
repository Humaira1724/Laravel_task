@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3> Edit Slider
                    <a href="{{url('admin/sliders/')}}" class="btn btn-danger text-white btn-sm float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
            <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">{{$slider->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{asset($slider->image)}}" alt="slider" style="width:50px;height:50px">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


@endsection