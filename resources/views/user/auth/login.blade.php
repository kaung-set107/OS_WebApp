@extends('user.layout.master') @section('content')

<div class="card">
    <div id="alert"></div>
    <div class="card-header bg-dark">
        <h2 class="text-white">Login</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input
                    type="email"
                    class="form-control border-1 text-dark"
                    name="email"
                    placeholder="Enter your email"
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
            <div class="sub">
                <input
                    type="submit"
                    value="Login"
                    class="btn btn-sm btn-outline-success"
                />
            </div>
        </form>
    </div>
</div>

@endsection()
