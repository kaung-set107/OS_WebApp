@extends('admin.layout.master') @section('content')
<a
    href="{{ route('admin.category.index') }}"
    class="btn btn-sm btn-primary mb-5"
    >All Category</a
>
<form action="{{ route('admin.category.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="#name">Enter Name</label><br />
        <input type="text" name="name" id="name" />
    </div>
    <input type="submit" value="Create" class="btn btn-sm btn-success mt-3" />
</form>

@endsection()
