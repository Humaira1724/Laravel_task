@extends('layouts.app')
@section('content')

<form class="m-2" action="{{route('payment')}}" method="POST"> 
    @csrf
    <h1>Customer Details</h1>
<div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mobile No</label>
        <input type="text" class="form-control" name="mobile"  placeholder="Mobile No">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="address" class="form-control" name="address"  placeholder="Enter Address ">
    </div>
    
<br>
    <button type="submit" class="btn btn-primary">Submit to pay</button>
</form>







@endsection