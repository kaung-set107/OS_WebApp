@extends('admin.layout.master') @section('content')
<!-- <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success"
    ><b>Create Category</b></a
> -->
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>Product</th>
            <th>User</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($order as $o)
        <tr>
            <td>{{ $o->product->name }}</td>
            <td>{{ $o->user->name }}</td>
            <td>{{ $o->qty }}</td>
            <td>{{ $o->qty * $o->product->price }}</td>
            <td>{{ $o->status }}</td>
            <td>
                <a
                    href="{{ url('/admin/order/complete/'.$o->id) }}"
                    class="badge badge-info"
                    >Make Complete</a
                >
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $order->links() }}
@endsection()
