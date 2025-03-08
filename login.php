<?php
$db = mysqli_connect("localhost", "root", "", "sandbox2");
session_start();
mysqli_query($db, "SET time_zone = '+3:30'");
mysqli_query($db, "SET CHARACTER SET 'utf8'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <div id="background"></div>
    <div class="contiener">
        <?php
        $error = "";
        $ok = false;
        if (isset($_POST["username"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $rpassword = $_POST["rpassword"];
            $_SESSION["email"] = $email;
            if (empty($username)) {
                $error = "نام کاربری الزامسیت";
                $ok = false;
            }
            if (empty($email)) {
                $error = "ایمیل کاربر الزامسیت";
                $ok = false;
            }
            if (empty($password)) {
                $error = "رمز برای کاربر الزامسیت";
                $ok = false;
            }
            if ($password != $rpassword) {
                $error = "تکرار رم عبور با رمز عبور برابر نیست.";
                $ok = false;
            }
            if ($error == "") {
                $ok = true;
            }
            if ($ok == true) {
                $insert = mysqli_query($db, "insert into user(Username,Email,Password,Rpassword)values('$username','$email','$password','$rpassword')");
                echo '<meta http-equiv="refresh" content="2; url=panel.php">';
            }
        }
        ?>
        <div class="login">
            <form action="" method="post">
                <h3>ثبت‌نام</h3>
                <input type="text" id="name" name="username" placeholder="نام کاربری" />
                <input type="email" id="email" name="email" placeholder="ایمیل" />
                <input type="password" id="password" name="password" placeholder="رمز عبور" />
                <input type="password" id="rpassword" name="rpassword" placeholder="تکرار رمز عبور" />
                <span>اگر قبل ثبت‌نام کردید بر روی این لینک بزنید:
                    <a href="signup.php">ورود</a></span>
                <button onclick="submits()">ثبت‌نام</button>
            </form>
        </div>
        <div class="errors">
            <?php
            echo  $error;
            ?>
        </div>
    </div>
</body>
<script src="Javascript/valid.js"></script>

</html>