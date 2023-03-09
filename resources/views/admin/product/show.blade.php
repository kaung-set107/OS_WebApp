@extends('admin.layout.master') @section('content')
<a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-success"
    ><b>All Product</b></a
>
<table class="table table-striped mt-3">
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Price</th>
        <th>View_Count</th>
    </tr>

    <tr>
        <td>{{ $product->name }}</td>
        <td>{{$product->category->name }}</td>
        <td>
            <img
                src="{{ asset($product->image) }}"
                style="width: 40px; border-radius: 10px"
            />
        </td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->view_count }}</td>

        <!-- <tr>
        <!-- <td colspan="5"> -->

        <!-- </td> -->
    </tr>
</table>

<h4 class="mt-3">Description</h4>
<p>
    {{ $product->description }}
</p>
@endsection()
