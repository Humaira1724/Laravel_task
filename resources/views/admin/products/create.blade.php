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
        <div class="card">
            <div class="card-header">

                <h3>Add Products
                    <a href="{{url('admin/products')}}" class="btn btn-danger text-white btn-sm float-end">Back
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">
                                Home
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO
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

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="image-tab-pane"
                                aria-selected="false">
                                Product Color
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
                                    <option value="{{$category -> id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" id="name" class=" input form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="decsription" id="decsription" class="form-control input"
                                    rows="4"></textarea>
                            </div>

                        </div>

                        <div class="tab-pane fade  border p-3" id="seotag-tab-pane" role="tabpanel"
                            aria-labelledby="seotag-tab" tabindex="0">


                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class=" input form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_decsription" id="meta_decsription" class="input form-control"
                                    rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword" class="input form-control"
                                    rows="4"></textarea>
                            </div>

                        </div>

                        <div class="tab-pane fade border p-3 " id="details-tab-pane" role="tabpanel"
                            aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Original Price</label>
                                        <input type="text" name="original_price" id="original_price"
                                            class="input form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Selling Price</label>
                                        <input type="text" name="selling_price" id="selling_price"
                                            class="input form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="input form-control" />
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
                        </div>

                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel"
                            aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Select Color</label><hr>
                                <div class="row">
                                    @forelse($colors as $coloritem)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Color: <input type="checkbox" name="colors[{{$coloritem->name}}]"
                                                value="{{$coloritem->name}}" />
                                            {{$coloritem->name}}
                                            <br>
                                            Quantity: <input type="number" name="colorquantity[{{$coloritem->name}}]"
                                                style="width:70px;border:1px solid ;">
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1>No Colors Found</h1>
                                    </div>
                                    @endforelse
                                </div>

                            </div>

                        </div>

                    </div>

            </div>
            <div class="py-2 float-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection