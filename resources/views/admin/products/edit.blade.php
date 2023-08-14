@extends('layouts.admin')

@section('content')
<style>
.input {
    border: 1px solid lightgrey;
    border-radius: 5px;
}

;
</style>
<div class="row">
    <div class="col-md-12">
    @if(session('message'))
                <h5 class="alert alert-success col-6 mb-2">{{session('message')}}</h5>
                @endif
        <div class="card">
            <div class="card-header">

                <h3>Edit Products
                    <a href="{{url('admin/products')}}" class="btn btn-danger text-white btn-sm float-end">Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                

                <form action="{{route('/products/update')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}" >                   
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">
                                Home
                            </button>
                        </li>



                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane"
                                aria-selected="false">
                                Product Image
                            </button>
                        </li>
                    </ul>

                    <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade  border p-3 show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-control" id="">
                                    <option value="" disabled> select category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category -> id}}"
                                        {{$category->id == $product->category_id? 'selected':''}}>
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" id="name" value="{{$product->name}}"
                                    class=" input form-control" />
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3 " id="details-tab-pane" role="tabpanel"
                            aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Original Price</label>
                                        <input type="text" name="original_price" value="{{$product->original_price}}"
                                            id="original_price" class="input form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Selling Price</label>
                                        <input type="text" name="selling_price" value="{{$product->selling_price}}"
                                            id="selling_price" class="input form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}"
                                            id="quantity" class="input form-control" />
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                            aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                            </div>
                            <input type="file" name="image[]" multiple class="form-control" />
                            <br>
                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-2">
                                    <img src="{{asset($image->image)}}" style="width:80px;height:80px;" class="me-4 border "
                                        alt="">
                                        <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                    </div>
                                    @endforeach
                                </div>


                                
                                @else
                                <h5>No image added</h5>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="py-2 float-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection