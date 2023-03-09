<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>K-Shop</title>
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        />
        <!-- Google Fonts -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        />
        <!-- Bootstrap core CSS -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <!-- Material Design Bootstrap -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            id="wsl-widget-css"
            href="https://mdbcdn.b-cdn.net/wp-content/plugins/wordpress-social-login/assets/css/style.css?ver=5.6.2"
            type="text/css"
            media="all"
        />
        <link
            rel="stylesheet"
            id="compiled.css-css"
            href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/compiled-4.19.2.min.css?ver=4.19.2"
            type="text/css"
            media="all"
        />
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    </head>

    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <a>
                                    <li
                                        class="list-group-item bg-info text-white"
                                    >
                                        Admin Panel
                                    </li>
                                </a>
                                <a href="{{ url('/admin/') }}">
                                    <li class="list-group-item">Dashboard</li>
                                </a>
                                <a href="{{ route('admin.category.index') }}">
                                    <li class="list-group-item">Category</li>
                                </a>
                                <a href="{{ route('admin.product.index') }}">
                                    <li class="list-group-item">Product</li>
                                </a>
                                <a href="{{ url('/admin/order/pending') }}">
                                    <li class="list-group-item">
                                        Pending Order
                                    </li>
                                </a>
                                <a href="{{ url('/admin/order/complete') }}">
                                    <li class="list-group-item">
                                        Complete Order
                                    </li>
                                </a>
                                <a href="{{ url('/admin/user') }}">
                                    <li class="list-group-item">User List</li>
                                </a>
                                <a href="{{ url('/admin/logout') }}">
                                    <li class="list-group-item">Logout</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            @include('inc.error') @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://demos.creative-tim.com/argon-dashboard/assets/js/argon.min.js?v=1.2.0"></script>
    </body>
</html>
