<?php
               $koneksi=mysqli_connect("localhost","root","","keretaapi");
               if (isset($_POST['submit'])){
                $user=$_POST['username'];
              $pass=md5($_POST['password']);
              $login=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE nama='$user' AND password='$pass'");
              $cek=mysqli_num_rows($login);
              if ($cek==1){
              $data=mysqli_fetch_array($login);
              session_start();
              $_SESSION['user']=$data['username'];
              $_SESSION['level']='pelanggan';
              header('location:index.php');
              }
              else {
                echo "<script>alert('username dan password incorrect')</script>";
              }
    }
?>