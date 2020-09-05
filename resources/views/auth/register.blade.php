<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--JS-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        body.register-page{
            background-image: linear-gradient(to right top, #051937, #41204d, #7a204c, #a33234, #ae5d00);
        }
        .bg-main-primary {
            background-color: #CF7500;
        }
        @media screen and (min-width: 768px) {
            .register-box{
                width: 720px;
            }
            .card-body{
                padding: 0;
            }
        }
        input {
            border: 1px solid #ccc !important;
            border-radius: 0 !important;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
        }
        input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #CF750090 !important;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }
    </style>

</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="/" class="text-decoration-none" style="font-size: 24px">
            <p class="text-white">
                Ekata Convenience Store
            </p>
        </a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <div class="row">
                <div class="col-md-5" style="background: url('https://ecommerceinsiders.com/wp-content/uploads/2017/02/Amazon-2.jpg') no-repeat center; background-size: cover; width: 100%;">
                </div>
                <div class="col-md-7" style="padding: 1rem 2rem 1rem 1rem;">
                    <p class="login-box-msg">Register a new user</p>

                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="First name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Last name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Address">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Suburb">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-road"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="State">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fab fa-stripe-s"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Postal Code">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-mail-bulk"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Contact Number">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-block bg-main-primary text-white">
                                Register
                            </a>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/" class="">Return to Website</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

</body>
</html>
