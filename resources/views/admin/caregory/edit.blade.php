@extends('admin.layout.master') @section('content')
<a
    href="{{ route('admin.category.index') }}"
    class="btn btn-sm btn-primary mb-5"
    >All Category</a
>
<form action="{{ route('admin.category.update',$cat->id) }}" method="post">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="#name">Enter Name</label>
        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="{{ $cat->name }}"
        />
    </div>
    <input type="submit" value="Update" class="btn btn-sm btn-success mt-3" />
</form>

@endsection()
