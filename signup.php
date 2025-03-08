<?php
$db = mysqli_connect("localhost", "root", "", "sandbox2");
session_start();
mysqli_query($db, "SET time_zone = '+3:30'");
mysqli_query($db, "SET CHARACTER SET 'utf8'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div id="background">
    </div>
    <div class="contiener">

        <div class="login">
            <form action="" method="post">
                <h3>ورود</h3>
                <input type="text" name="username" placeholder="نام کاربری" id="name">
                <input type="password" name="password" placeholder="رمز عبور" id="pass">
                <span>برای ثبت‌نام این لینک را بزنید: <a href="login.php">ثبت‌نام</a></span>
                <button onclick="send()" id="btn">ورود</button>
            </form>
        </div>
    </div>
</body>
<script src="Javascript/valid.js"></script>
<script src="Javascript/ajax.js"></script>

</html>