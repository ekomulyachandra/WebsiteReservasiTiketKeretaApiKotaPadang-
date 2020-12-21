<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form action="aksi_pelanggan.php?proses=register" method="post">
            <div class="clearfix"></div>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="nama" placeholder="Nama" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input id="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="alamat" placeholder="Alamat" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="kota" placeholder="Kota" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="kota" placeholder="Tanggal lahir" type="date" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="nohp" placeholder="No Hp" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">I accept Terms of Service</span>
            </div>

            <input type="submit" value="Register" />
        </form>

        <div class="privacy">
            <a href="#">Privacy Policy</a>
        </div>

        <div class="register">
            Do you already have an account?
            <a href="login.php"><button id="register-link">Log In here</button></a>
        </div>
    </div>
</body>

</html>
