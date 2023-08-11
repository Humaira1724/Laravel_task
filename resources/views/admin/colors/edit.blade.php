@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3> Edit Color
                    <a href="{{url('admin/colors'.$color->id)}}" class="btn btn-danger text-white btn-sm float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
            <form action="{{route('/colors/update')}}" method="POST">
                @csrf
                <input type="hidden" id = "color_id" name = "color_id" value = "{{ $color->id }}">
                <div class="mb-3">
                    <label for="">Color Name</label>
                    <input type="text" name="name" value="{{$color->name}}"  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Color Code</label>
                    <input type="text" name="code" value="{{$color->code}}" class="form-control">
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