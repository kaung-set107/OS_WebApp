@extends('admin.layout.master') @section('content')
<a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success"
    ><b>Create Product</b></a
>
<table class="table table-striped mt-3">
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>

        <th>Option</th>
    </tr>

    @foreach($products as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->category->name }}</td>
        <td>
            <img
                src="{{ asset($p->image) }}"
                style="width: 40px; border-radius: 10px"
            />
        </td>

        <td>
            <a
                href="{{ route('admin.product.edit',$p->id) }}"
                class="badge badge-info"
                >Update</a
            >

            <a
                href="{{ route('admin.product.show',$p->id) }}"
                class="badge badge-dark text-white d-inline"
                >Detail</a
            >

            <form
                action="{{ route('admin.product.destroy',$p->id) }}"
                method="POST"
                id="delete"
                class="d-inline"
            >
                @csrf @method('DELETE')
                <!-- <a
                    href="#"
                    onclick="confirm('Delete?') ? document.getElementById('delete').submit() :false "
                    class="badge badge-danger"
                    >Delete</a
                > -->
                <button
                    type="submit"
                    onclick="return confirm('Do you want to delete this Category?')"
                    class="badge badge-danger"
                >
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $products->links() }}
@endsection()
