@extends('admin.layout.master') @section('content')
<!-- <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success"
    ><b>Create Category</b></a
> -->

<h4 class="mb-3">ALL USER</h4>

<table class="table table-striped mt-3">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <td>Order_Count</td>
    </tr>

    @foreach($user as $u)
    <tr>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>
            <img
                src="{{ asset($u->image) }}"
                style="width: 50px; border-radius: 10px"
                alt=""
            />
        </td>
        <td>{{ $u->order_count }}</td>
    </tr>
    @endforeach
</table>
{{ $user->links() }}

@endsection()
