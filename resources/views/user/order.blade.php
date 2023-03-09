@extends('user.layout.master') @section('content')
<div class="card">
    <div class="card-body">
        @include('user.error') @if($status=='pending')
        <h2>Your Pending Order List</h2>
        @else
        <h2>Your Complete Order List</h2>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <!-- @if($status=='pending')
                    <th>Add or Reduce</th>
                    @endif -->
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $c)
                <tr>
                    <td>{{ $c->product->name }}</td>
                    <td>
                        <img
                            src="{{ asset($c->product->image) }}"
                            style="width: 50px; border-radius: 30%"
                            alt=""
                        />
                    </td>
                    <td>{{ $c->product->price }}</td>
                    <td>4</td>
                    <!-- @if($status=='pending')
                    <td>
                        <span class="badge badge-danger">-</span>
                        <span class="badge badge-success">+</span>
                    </td>
                    @endif -->
                </tr>

                <!-- <tr>
                    <td colspan="5">
                        <div class="text-center">Total</div>
                    </td>
                    <td>40000ks</td>
                </tr> -->
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">
    {{ $orders->links() }}
</div>
@endsection()
