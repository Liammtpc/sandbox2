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
    <title>الو دکتر</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/kamadatepicker.min.css">
</head>

<body>
    <div class="contiener">
        <div class="background"></div>
        <header>
            <div class="topMenu">
                <div class="logo">Doctor</div>
                <div class="searchBox">
                    <form action="" method="post">
                        <input type="search" placeholder="جستجو..." />
                        <button></button>
                    </form>
                </div>
                <div class="logins">
                    <button><a href="login.php">ثبت نام/ ورود</a></button>
                </div>
            </div>
            <div class="subMenu">
                <nav>
                    <ul>
                        <li><a href="index.php">خانه</a></li>
                        <li><a href="">درباره ما</a></li>
                        <li><a href="guide.php">راهنما</a></li>
                        <li><a href="">ارتباط با ما</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <?php
            $ok = false;
            $error = "";
            if (isset($_POST["sub"])) {
                $midc = $_POST["midc"];
                $time = $_POST["time"];
                $server = $_SERVER['SERVER_ADDR'];
                if (empty($midc)) {
                    $error = "نام دارو الزامی است";
                    $ok = false;
                }
                if (empty($time)) {
                    $error = "زمان دارو الزامی است";
                    $ok = false;
                }
                if ($error == "") {
                    $ok = true;
                }
                if ($ok == true) {
                    $stmt = mysqli_prepare($db, "INSERT INTO alarm (Medicine, Time, person) VALUES (?, ?, ?)");
                    mysqli_stmt_bind_param($stmt, "sss", $midc, $time, $server);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
            }
            if (!empty($error)) {
                echo "<p style='color: red;'>$error</p>";
            }
            ?>
            <form action="" method="post" id="alarm">
                <input type="text" name="midc" id="midc" placeholder="دارو">
                <input type="text" id="dates" name="time">
                <button id="clock" name="sub" class="setAlarmButton">یادآوری</button>
            </form>
            <table id="table">
                <tr>
                    <th id="row">ردیف</th>
                    <th>داور</th>
                    <th>زمان</th>
                    <th>حذف</th>
                </tr>
                <?php
                $server = $_SERVER['SERVER_ADDR'];
                $selectShow = mysqli_query($db, "select*from alarm where person='$server'");
                while ($rowShows = mysqli_fetch_assoc($selectShow)) {
                    echo '
                               <tr>
                                      <td id="row">' . $rowShows["Id"] . '</td>
                                      <td>' . $rowShows["Medicine"] . '</td>
                                       <td>' . $rowShows["Time"] . '</td>
                                      <td><div class="edit"><a href="http://localhost/sandbox2/alarm.php?del=' . $rowShows["Id"] . '">حذف</a></div></td>
                                </tr>';
                }
                ?>
                <?php
                if (isset($_GET["del"])) {
                    $Del = $_GET["del"];
                    $delete = mysqli_query($db, "delete from alarm where Id=$Del");
                }
                ?>
            </table>
        </main>
        <footer>
            <div class="topFooter">
                <div class="aboutsUS">
                    <h3>درباره ما</h3>
                    <p>
                        این سایت در سال 1404 با هدف مدیریت داور و هشدار جهت یادآوری برای
                        خوردن دارو سر وقت ساخت شده است و همچنین بهبود و افزایش سلامتی مردم
                        می‌باشد.
                    </p>
                </div>
                <div class="page">
                    <h3>دسترسی سریع</h3>
                    <nav>
                        <ul>
                            <li><a href="">خانه</a></li>
                            <li><a href="">درباره ما</a></li>
                            <li><a href="">راهنما</a></li>
                            <li><a href="">ارتباط با ما</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="contacts">
                    <h3>ارتباطات</h3>
                    <div class="social">
                        <img src="Picture/Layer 10.png" alt="" />
                        <span>کرمانشاه، سنقر، خیابان بهشنی</span>
                    </div>
                    <div class="social">
                        <img src="Picture/Layer 9.png" alt="" />
                        <span>liam202597@gmail.com</span>
                    </div>
                    <div class="social">
                        <img src="Picture/Layer 11.png" alt="" id="phone" />
                        <span>09182680000</span>
                    </div>
                </div>
            </div>
            <div class="subFooter">
                <p>تمامی محتویات سایت محفوظ می‌باشد.</p>
            </div>
        </footer>
    </div>
    <script src="Javascript/jqoury.js"></script>
    <script src="Javascript/kamadatepicker.min.js"></script>
    <script src="Javascript/clander.js"></script>
</body>

</html>