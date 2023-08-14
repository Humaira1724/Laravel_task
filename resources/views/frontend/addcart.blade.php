@extends('layouts.app')
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:20%">Image</th>
            <th style="width:10%">Name</th>
            <th style="width:10%">Price</th>
            <th style="width:15%">Total Price</th>
            <th style="width:25%">Quantity</th>
            <th style="width:10%">Action</th>

        </tr>
    </thead>
    <!-- <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $products)
        @php $total += $products['price'] * $products['quantity'] @endphp
       
        <tr data-id="{{ $id }}">
            <td data-th="Product">

                @if($productItem->id == $id)
                @if($productItem->image)
                <img src="{{ asset($productItem->image) }}" style="width:50px;height:50px" alt="img">
                @endif
                <div class="col-sm-9">
                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                </div>
                @endif

            </td>
            <td data-th="Price">{{ $products['price'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update"
                    min="1" />
            </td>
            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">No items in the cart</td>
        </tr>
        @endif
    </tbody> -->
    <tbody>
        @php
        $total = 0;
        foreach ($products as $product) {
        $total += $product['selling_price'] *2;
        }
        @endphp

        <?php if(count($products)){
            $count = 1;
        foreach ($products as $product){ ?>
        <tr>
            <td>
                <img src="{{ asset($product->image) }}" style="width:70px; height:70px" alt="product">
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->selling_price}}</td>
            <td id="total_price{{ $count }}">
            {{$product->selling_price}}
                
            </td>
            <td>
                <div class="container">
                    <input type="button" onclick="decrementValue({{ $count }}, {{ $product->selling_price }})" value="-" />
                    <input type="text" id="quantity{{ $count }}" name="quantity" value="1" maxlength="2" max="10"
                        size="1" />
                        <input type="button" onclick="incrementValue({{ $count }}, {{ $product->selling_price }})" value="+" />

                </div>
            </td>
            <td>
                <a href="{{url('addcart'.$product->id.'/delete')}}"
                    onclick="return confirm('Are you sure want to remove this item?')" class="btn btn-sm btn-danger">
                    Remove</a>
            </td>
            <td>

            </td>
        </tr>
        <?php $count ++; }}else{ ?>}
        <tr>
            <td colspan="7">No Products Available</td>
        </tr>
        <?php }
         ?>

    </tbody>

    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total ${{ $total }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
              
                <a href="{{url('checkout')}}" class="btn btn-success"><i class="fa fa-money"></i> Checkout</a>
            </td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
function incrementValue(count , price) {


    var value = parseInt(document.getElementById('quantity' + count).value, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
        value++;
        document.getElementById('quantity' + count).value = value;
    }

    var product_price = value * price;
    
    var tdElement = document.getElementById("total_price"+count);
    tdElement.innerHTML = product_price;

}

function decrementValue(count , price) {
    var value = parseInt(document.getElementById('quantity' + count).value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
        value--;
        document.getElementById('quantity' + count).value = value;
    }

    var product_price = value * price;
    
    var tdElement = document.getElementById("total_price"+count);
    tdElement.innerHTML = product_price;

}
</script>
@endsection