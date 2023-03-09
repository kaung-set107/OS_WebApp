@extends('admin.layout.master') @section('content')
<!-- <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success"
    ><b>Create Category</b></a
> -->
<style>
    .col-md-4 {
        width: 35px;
        padding: 30px;
        text-align: center;

        font-size: larger;
        color: aliceblue;
        border-radius: 10px;
    }
    .tex {
        background-color: rgb(3, 3, 3);
        width: 35px;

        margin-left: 90px;
        margin-top: 20px;
        border-radius: 100px;
        font-size: large;
    }
    /* .content {
        display: flex;
        justify-content: space-between;
        max-width: 400px;
        margin: 0 auto;

        padding: 30px 0;
    }

    span {
        width: 100px;
        height: 70px;
        background: black;
    } */
</style>

<div class="row">
    <div class="col-md-4 bg-info">
        <b>Total User</b><br />
        <div class="tex text-white">{{ $user_count }}</div>
    </div>
    <div class="col-md-4 bg-warning">
        <b>Pending Order</b><br />
        <div class="tex text-white">{{ $pending_count }}</div>
    </div>
    <div class="col-md-4 bg-success">
        <b>Complete Order</b><br />
        <div class="tex text-white">{{ $complete_count }}</div>
    </div>
</div>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>User</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($order as $o)
        <tr>
            <td>{{ $o->user->name }}</td>
            <td>{{ $o->product->name }}</td>
            <td>{{ $o->qty }}</td>
            <td>{{ $o->qty * $o->product->price }}</td>
            <td>
                @if($o->status =='pending')
                <div class="badge badge-warning">Pending</div>
                @else
                <div class="badge badge-primary">Complete</div>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection()
