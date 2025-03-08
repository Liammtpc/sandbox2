<?php
$db = mysqli_connect("localhost", "root", "", "sandbox2");
session_start();
$ok = false;
$error="";
if (isset($_GET["user"])) {
    $user = $_GET["user"];
    $pass =  $_GET["pass"];

    $sql = mysqli_query($db, "select*from user where Username='$user'and Password='$pass'");
    if ($row = mysqli_fetch_all($sql)) {
        $ok=true;
    } else {
        $error = "رمز عبور یا نام کاربری اشتباه است.";
        $ok=false;
    }
} 
if ($ok == true) {
    echo '1';
} else {
    echo '0';
}
