@extends('layouts.admin')

@section('content')
<style>
.input_field {
    border: 1px solid lightslategrey;
    border-radius: 8px;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-danger text-white btn-sm float-end">Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label for="">Name</label><br>
                            <input type="text" name="name" value="{{$category->name }}"
                                class="form-control input_field" />
                            @error('name') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label for="">Slug</label><br>
                            <input type="text" name="slug" value="{{$category->slug  }}"
                                class="form-control input_field" />
                            @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" col-md-12 mb-3">
                            <label for="">Description</label><br>
                            <input type="text" name="description" value="{{$category->description  }}"
                                class="form-control input_field" />
                            @error('description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label for="">Image</label><br>
                            <input type="file" name="image" class="form-control input_field" />
                            <br><img src="{{asset('/uploads/category/'.$category->image) }}" width="60px"
                                height="60px" />
                            @error('image') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" value="{{$category->status == '1' ? 'checked' : ''}}"
                                class="input_field" />
                            @error('status') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>

                        <div class=" col-md-6 mb-3">
                            <label for="">Meta Title</label><br>
                            <input type="text" name="meta_title" value="{{$category->meta_title  }}"
                                class="form-control input_field" />
                            @error('meta_title') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" col-md-12 mb-3">
                            <label for="">Meta Keyword</label><br>
                            <textarea name="meta_keyword" rows="3" 
                                class="form-control input_field">{{$category->meta_keyword }}</textarea>
                            @error('meta_keyword') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" col-md-12 mb-3">
                            <label for="">Meta Description</label><br>
                            <textarea name="meta_description" rows="3"
                                class="form-control input_field">{{$category->meta_description}}</textarea>
                            @error('meta_description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection