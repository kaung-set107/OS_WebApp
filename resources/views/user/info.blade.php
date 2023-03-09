@extends('user.layout.master') @section('content')

<div class="card">
    @include('user.error')
    <div class="card-header">
        <h3 class="text-dark">Profile</h3>
    </div>
    <div class="card-body">
        <form
            action="{{ url('/profile') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <input
                    type="text"
                    class="form-control border-1 text-dark"
                    name="name"
                    value="{{ $user->name }}"
                />
            </div>
            <div class="form-group">
                <input
                    type="email"
                    class="form-control border-1 text-dark"
                    name="email"
                    value="{{ $user->email }}"
                />
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" id="" />
                <img
                    src="{{ asset($user->image) }}"
                    style="width: 30%; border-radius: 10px"
                    alt=""
                    class="mt-3"
                />
            </div>
            <input
                type="submit"
                value="Update"
                class="btn btn-sm btn-success"
            />
        </form>
    </div>
</div>

@endsection()
