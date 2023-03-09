@extends('user.layout.master') @section('content')

<div class="card">
    <div id="alert"></div>
    <div class="card-header bg-dark">
        <h3 class="text-white">Register</h3>
    </div>
    <div class="card-body">
        <form
            action="{{ url('/register') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <input
                    type="text"
                    class="form-control border-1 text-dark"
                    name="name"
                    placeholder="Name ..."
                />
            </div>
            <div class="form-group">
                <input
                    type="email"
                    class="form-control border-1 text-dark"
                    name="email"
                    placeholder="Email ..."
                />
            </div>
            <div class="form-group">
                <input
                    type="password"
                    class="form-control border-1 text-dark"
                    name="password"
                    placeholder="*****"
                />
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" id="" />
            </div>
            <input
                type="submit"
                value="Register"
                class="btn btn-sm btn-outline-success"
            />
        </form>
    </div>
</div>

@endsection()
