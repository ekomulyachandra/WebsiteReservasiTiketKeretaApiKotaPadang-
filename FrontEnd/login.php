<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> Login
        </div>

        <form method="post">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="email" type="text" required class="validate" autocomplete="off" name="username">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" required class="validate" autocomplete="off" name="password">
            </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">Remember Me</span>
            </div>
            
            <input type="submit" value="Log In" name="submitt" />
        </form>
        <?php
          $koneksi=mysqli_connect("localhost","root","","keretaapi");
          if (isset($_POST['submitt'])){
          $user=$_POST['username'];
          $pass=md5($_POST['password']);
          $login=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE email like '$user' AND password like'$pass'");
          $cek=mysqli_num_rows($login);
          if ($cek==1){
                  $data=mysqli_fetch_array($login);
                  session_start();
                  echo "string";
                  $_SESSION['nama']=$data['nama'];
                  $_SESSION['email']=$data['email'];
                  $_SESSION['id']=$data['id'];
                  $kode=$_GET[kode];
                  $harga=$_GET[harga];
                  $tgl=$_GET[tgl];
                  header('location:index.php?p=search&aksi=pemesanan&kode='.$kode.'&harga='.$harga.'&tgl='.$tgl);
            }
          else {
                echo "<script>alert('username dan password incorrect')</script>";
          }
        }
      ?>

        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
        </div>
        <div class="privacy">
            <a href="#">Privacy Policy</a>
        </div>

        <div class="register">
            Don't have an account yet?
            <a href="register.php"><button id="register-link">Register here</button></a>
        </div>
    </div>
</body>

</html>
