@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>
        <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Person Name</p>
                    <input class="form-control mb-3" type="text" placeholder="Name">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p>
                    <input class="form-control mb-3" type="text">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p>
                    <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p>
                    <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                </div>
            </div>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Pay
                Now</button>

            <a href="{{url('/')}}">Back to home</a>
        </div>
    </div>
</div>


<div class="container">

    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Confirm Payment</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to proceed with the payment?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-target="#myModal"
                        data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection