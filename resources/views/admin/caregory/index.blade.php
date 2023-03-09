@extends('admin.layout.master') @section('content')
<a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success"
    ><b>Create Category</b></a
>
<table class="table table-striped mt-3">
    <tr>
        <th>Name</th>
        <th>Option</th>
    </tr>

    @foreach($categories as $c)
    <tr>
        <td>{{ $c->name }}</td>
        <td>
            <a
                href="{{ route('admin.category.edit',$c->id) }}"
                class="badge badge-info"
                >Update</a
            >
            <form
                action="{{ route('admin.category.destroy',$c->id) }}"
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

@endsection()
