<!-- <style>
    #main {
        height: 120vh;
        background: linear-gradient(#f8efc2, rgb(255, 255, 255));
        border-bottom-left-radius: 1%;
        /* border-bottom-right-radius: 10%; */
    }
</style> -->
@extends('user.layout.master') @section('content')
<!-- Loop Product -->

<div id="main" class="card mb-3">
    <div class="card-body">
        <div id="alert"></div>
        <div class="row ind">
            @foreach($products as $p)
            <div class="col-md-4">
                <div class="card">
                    <a href="{{ url('/product/'.$p->slug) }}">
                        <img
                            class="card-img-top"
                            src="{{ asset($p->image) }}"
                        />
                    </a>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <small>{{ $p->name }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <i
                                    class="badge badge-primary"
                                    >{{ $p->price }}</i
                                >
                            </div>
                            <div class="col-md-9">
                                <i class="badge badge-warning"
                                    ><small>{{ $p->category->name }}</small></i
                                >
                            </div>
                        </div>
                        <a
                            href="{{ url('product/cart/add/'.$p->slug) }}"
                            class="badge badge-sm badge-info mt-3"
                        >
                            Add To Cart
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

@endsection()
