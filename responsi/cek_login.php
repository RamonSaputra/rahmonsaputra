<?php
session_start();
include "koneksi.php";
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM admin WHERE email='$email' AND
password ='$password'";
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {

    $login = mysqli_query($konek, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
    if ($ketemu > 0) {
        $_SESSION['login'] = "LOGIN";
        header("location:tampil_data.php");
    } else {
        echo "<center>Login gagal! username & password tidak
   benar<br>";
        echo "<a href=form_login.php><b>ULANGI
   LAGI</b></a></center>";
    }
    mysqli_close($konek);
} else {
    echo "<center>Login gagal! Captcha tidak sesuai<br>";
    echo "<a href=form_login.php><b>ULANGI
   LAGI</b></a></center>";
}
