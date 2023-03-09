@extends('admin.layout.master') @section('content')
<!-- <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success"
    ><b>Create Category</b></a
> -->
<div class="card">
    <div class="card-header">Complete Order</div>
    <div class="card-body">
        <form
            action="{{ url('admin/order/complete') }}"
            method="get"
            class="row"
        >
            <div class="form-group col-md-4">
                <input type="date" name="start_date" id="" />
            </div>
            <div class="form-group col-md-4">
                <input type="date" name="end_date" id="" />
            </div>

            <div class="form-group col-md-4">
                <input type="submit" value="Filter" />
            </div>
        </form>
        @if(isset(request()->start_date))
        <div class="text text-info" class="row">
            <b>Between</b>

            <b class="text text-dark">
                {{ request()->start_date }}
            </b>

            <b>To</b>

            <b class="text text-dark">
                {{ request()->end_date }}
            </b>

            <a
                href="{{ url('/admin/order/complete') }}"
                class="badge badge-info"
                >Show All</a
            >
        </div>

        @endif
    </div>
</div>
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>Product</th>
            <th>User</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Status</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
{{ $order->links() }}

@endsection()
