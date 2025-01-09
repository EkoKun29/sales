<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login Page">
    <meta name="author" content="YourName">
    <link href="../../assets/img/logo/AliansyahLogoo.png" rel="icon">
    <title>MSK KOOR</title>
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/ruang-admin.min.css" rel="stylesheet">
    <style>
        .password-wrapper {
            position: relative;
        }
        .password-wrapper #togglePassword {
            position: absolute;
            right: 10px;
            top: 75%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>MSK KOOR</b></h1>
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login Untuk Masuk !!</h1>
                                    </div>
                                    <form class="user" action="{{ route('_postlogin') }}" method="POST" autocomplete="off" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                                        </div>
                                        <div class="form-group password-wrapper">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required>
                                            <span id="togglePassword">👁️</span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <p class="mx-auto mb-6 leading-normal text-sm">
                                            Belum memiliki akun?
                                            <a href="{{ route('_register') }}" class="font-weight-bold text-primary">Daftar Sekarang</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../assets/js/ruang-admin.min.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('exampleInputPassword');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    </script>
</body>

</html>
