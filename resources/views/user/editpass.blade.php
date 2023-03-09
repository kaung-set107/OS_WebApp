@extends('user.layout.master') @section('content')

<div class="card">
    <div id="alert"></div>
    <div class="card-header">
        <h2 class="text-dark">Change Your Password</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('/changepassword') }}" method="POST">
            @csrf

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
                    value="Change Password"
                    class="btn btn-sm btn-outline-success"
                />
            </div>
        </form>
    </div>
</div>

@endsection()
