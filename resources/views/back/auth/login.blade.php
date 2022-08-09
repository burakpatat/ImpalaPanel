<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Impala Panel - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('back/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('back/')}}/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
        /* fallback for old browsers */
        background: #d299c2;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(210, 153, 194, 0.7), rgba(254, 249, 215, 0.7));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(210, 153, 194, 0.7), rgba(254, 249, 215, 0.7));
        }

    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            <img class="img-fluid" style="width:20%;height:20%;"
                                        src="{{asset('back/')}}/img/impalaicon.png" />
                                            | Impala Panel</h1>
                                    </div>
                                    @if($errors->any())
                                        <div class="text-center">
                                            <p style="color:red;">{{$errors->first()}}</p>
                                        </div>
                                    @endif
                                    <form class="user" method="post" action="{{route('admin.login.post')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Kullanıcı Adı">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifre">
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            Giriş
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4"
                                        src="{{asset('back/')}}/img/PoisonSoftware.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <p style="color:rgb(70, 69, 69);"><b>neamakrikayakoy.com</b> Yönetim Paneli</p>
                    <p style="color:rgb(70, 69, 69);">
                        Impala Panel yönetici sistemi ile ilgili tüm sorun ve sorularınız için
                        <b>+90(545)525 8612</b> no’lu telefonu arayabilir veya <b>support@impalasoftware.co</b> adresine mail gönderebilirsiniz.
                        <br>
                        &copy;<script>document.write(new Date().getFullYear());</script><a href="http://impalasoftware.co/" target="_blank" style="color:#e83e8c;text-decoration:none;"> Impala Software </a>
                    </p>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>

</body>

</html>
