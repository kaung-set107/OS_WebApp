<!-- <style>
    #main {
        height: 110vh;
        background: linear-gradient(#fff1b1, rgb(255, 255, 255));
        border-bottom-left-radius: 1%;
        /* border-bottom-right-radius: 10%; */
    }
    #detail {
        height: 50vh;
        background: linear-gradient(#fff8d8, rgb(255, 249, 217));
        border-bottom-left-radius: 1%;
    }
</style> -->
@extends('user.layout.master') @section('content')

<div id="main" class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $product->name }}</h1>
            </div>
        </div>
        <div class="row mt-3 mb-3 ml-5">
            <div class="col-md-12 ml-5">
                <img
                    src="{{ asset($product->image) }}"
                    style="width: 60%; border-radius: 20px"
                    class="ml-3"
                />
            </div>
        </div>
        <div class="card" id="detail">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a
                            href="{{ url('product/cart/add/'.$product->slug) }}"
                            class="btn btn-sm btn-primary rounded"
                        >
                            <i class="fas fa-cart-arrow-down">&nbsp; Cart</i>
                        </a>
                    </div>
                    <div class="col-md-4 mt-2 ml-3">
                        <b>
                            <i class="fas fa-eye"></i>
                            {{ $product->view_count }}
                        </b>
                    </div>
                    <div class="col-md-3 mt-3">
                        <a
                            href=""
                            class="badge badge-primary"
                            >{{ $product->category->name }}</a
                        >
                    </div>
                </div>
                <div id="des" class="row mt-3">
                    <div class="col-md-12">
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
