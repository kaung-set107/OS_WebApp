@extends('admin.layout.master') @section('content')
<a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-primary mb-5"
    >All Product</a
>
<form
    action="{{ route('admin.product.update',$pro->id) }}"
    method="post"
    enctype="multipart/form-data"
>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="#name">Enter Name</label>
        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="{{ $pro->name }}"
        />
    </div>
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="cat_id" id="" class="form-control">
            @foreach($cat as $c)
            <option value="{{ $c->id }}" @if($c->
                id == $pro->category_id) selected @endif >
                {{ $c->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Enter Price</label>
        <input
            type="number"
            value="{{ $pro->price }}"
            name="price"
            class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="">Enter Description</label>
        <textarea
            name="description"
            class="form-control"
            id=""
            cols="30"
            rows="10"
            >{{ $pro->description }}</textarea
        >
    </div>
    <div class="form-group">
        <label for="">Choose Image</label>
        <input type="file" name="image" class="form-control border-0" />
        <img
            src="{{ asset($pro->image) }}"
            style="width: 30%; border-radius: 20px"
            alt=""
        />
    </div>
    <input type="submit" value="Update" class="btn btn-sm btn-success mt-3" />
</form>

@endsection()
