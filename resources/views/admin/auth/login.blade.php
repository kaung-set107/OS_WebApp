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

        <!-- <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/nucleo/css/nucleo.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/css/argon.min.css?v=1.2.0"> -->
        <style>
            #header {
                height: 60vh;
                background: linear-gradient(#007bff, white);
                border-bottom-left-radius: 10%;
                border-bottom-right-radius: 10%;
            }

            #header .nav-link {
                color: white !important;
            }

            #header img {
                width: 60% !important;
            }
            h2,
            p {
                text-align: center;
            }

            .sub {
                float: left;
            }
            .container {
                width: 40%;
            }
        </style>
    </head>

    <body>
        <div class="container mt-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-white">Admin Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/login') }}" method="post">
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
                                class="btn btn-sm btn-success"
                            />
                        </div>
                    </form>
                    <!-- <div class="text">
                        <p class="mt-2">
                            If you do not have Account , &nbsp;<a
                                href="{{ url('/admin/register/') }}"
                                >Register</a
                            >&nbsp;Now!
                        </p>
                    </div> -->
                </div>
            </div>
        </div>
    </body>
</html>
