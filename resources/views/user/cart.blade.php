@extends('user.layout.master') @section('content')
<div class="card">
    <div class="card-body">
        @include('user.error')
        <h2>Your Cart List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <!-- <th>Add or Reduce</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $c)
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
                    <td>
                        <a href="" class="badge badge-success">+</a>
                        <a href="" class="badge badge-danger">-</a>
                    </td>
                    <!-- <td>
                        <a href="{{ url('/product/delete'.$c->product->id) }}"
                            ><span class="badge badge-sm badge-danger ml-5">
                                X</span
                            ></a
                        >
                    </td> -->
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
        <a href="{{ url('/order/cart') }}" class="btn btn-primary"
            >Make Order</a
        >
    </div>
</div>
@endsection()
