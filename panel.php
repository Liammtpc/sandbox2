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
    <div class="contiener">
        <header>
            <div class="Menu">
                Doctor
                <button><a href="logout.php">خروج</a></button>
            </div>
        </header>
        <main>
            <div class="edits" >
                <div class="closes">
                    <button>بستن</button>
                </div>
                <form action="" method="post">
                    <input type="text" id="midicencE" class="gap" name="medicine">
                    <input type="text" id="timeE" name="time">
                    <button name="submit" onclick="save()">ویرایش</button>
                </form>
            </div>
            <div class="addmidicenc">
                <form action="" method="post">
                    <input type="text" id="midicenc" name="medicine">
                    <input type="text" id="time" name="time">
                    <button name="submit" onclick="save()">افزودن داور</button>
                </form>
                <?php
                $ok = false;
                $error = "";
                if (isset($_POST["submit"])) {
                    $medicine = $_POST["medicine"];
                    $time = $_POST["time"];
                    if (empty($medicine)) {
                        $error = "نام دارو الزامسیت";
                        $ok = false;
                    }
                    if (empty($time)) {
                        $error = "تایم دارو الزامسیت";
                        $ok = false;
                    }
                    if ($error == "") {
                        $ok = true;
                    }
                    if ($ok == true) {
                        $insert = mysqli_query($db, "insert into medicine(Medicine,time)values('$medicine','$time')");
                    }
                }
                ?>
            </div>
            <div class="displayMidicinec">
                <h2>نمایش دارو</h2>
                <table>
                    <tr>
                        <th id="row">ردیف</th>
                        <th>داور</th>
                        <th>زمان</th>
                        <th>حذف و یرایش</th>
                    </tr>
                    <?php
                    $show = mysqli_query($db, "select*from medicine where 1");
                    while ($rowShow = mysqli_fetch_array($show)) {
                        echo '
                          <tr>
                             <td id="row">' . $rowShow["Id"] . '</td>
                             <td>' . $rowShow["Medicine"] . '</td>
                             <td>' . $rowShow["Time"] . '</td>
                             <td><div class="edit"><a href="http://localhost/sandbox2/panel.php?edit=' . $rowShow["Id"] . '" class="btnEdit">ویرایش</a><a href="http://localhost/sandbox2/panel.php?del=' . $rowShow["Id"] . '">حذف</a></div></td>
                          </tr>';
                    }
                    ?>
                    <?php
                    if (isset($_GET["del"])) {
                        $Del = $_GET["del"];
                        $delete = mysqli_query($db, "delete from medicine where Id=$Del");
                    }
                    ?>
                    <?php
                    if (isset($_GET["edit"])) {
                        $edit_id = $_GET["edit"];
                        $edit_query = mysqli_query($db, "SELECT * FROM medicine WHERE Id = $edit_id");
                        if ($edit_row = mysqli_fetch_assoc($edit_query)) {
                            $medicine_edit = $edit_row['Medicine'];
                            $time_edit = $edit_row['Time'];
                            echo "
                            <script>
                                   document.getElementById('medicineE').value = '$medicine_edit';
                                   document.getElementById('timeE').value = '$time_edit';
                                   document.querySelector('.edits').style.display = 'flex';
                            </script>";
                        }
                    }
                    $edit = false;
                    $error = "";
                    if (isset($_POST['edit_submit'])) {
                        $medicine = $_POST["medicine"];
                        $time = $_POST["time"];
                        if (empty($medicine)) {
                            $edit = false;
                            $error = "فیلد دارو خالی است";
                        }
                        if ($error == "") {
                            $edit = true;
                        }
                        if ($edit == true) {
                            $update_query = mysqli_query($db, "UPDATE medicine SET Medicine = '$medicine', Time = '$time' WHERE Id = $edit_id");
                            if ($update_query) {
                                header("Location: panel.php");
                                exit();
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </main>
    </div>
</body>
<script src="Javascript/localstorge.js"></script>

</html>