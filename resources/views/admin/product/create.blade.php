@extends('admin.layout.master') @section('content')
<a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-primary mb-5"
    >All Product</a
>
<form
    action="{{ route('admin.product.store') }}"
    method="post"
    enctype="multipart/form-data"
>
    @csrf
    <div class="form-group">
        <label for="#name">Enter Name</label>
        <input type="text" name="name" id="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="cat_id" id="" class="form-control">
            @foreach($cat_id as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Enter Price</label>
        <input type="number" name="price" class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Enter Description</label>
        <textarea
            name="description"
            class="form-control"
            id=""
            cols="30"
            rows="10"
            placeholder="Write Description for your product . . . . ."
        ></textarea>
    </div>
    <div class="form-group">
        <label for="">Choose Image</label>
        <input type="file" name="image" class="form-control border-0" />
    </div>
    <input type="submit" value="Create" class="btn btn-sm btn-success mt-3" />
</form>

@endsection()
