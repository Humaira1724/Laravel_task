@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Colors List
                    <a href="{{url('admin/colors/create')}}" class="btn btn-primary text-white btn-sm float-end">
                        Add Color
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Color Name</th>
                            <th>Color Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->code}}</td>
                                <td>
                                    <a href="{{url('admin/colors/'.$item->id.'/edit')}}"
                                        class="btn-sm btn btn-warning">Edit</a>
                                    <a href="{{url('admin/colors/'.$item->id.'/delete')}}" 
                                    onclick="return confirm('Are you sure you wat to delete this data?')"  class="btn-sm btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection