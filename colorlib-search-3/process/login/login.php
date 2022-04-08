<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM taikhoandn WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $_SESSION["user"] = $_POST;
        header("Location:trangchu.php");
        exit;
    } else if ($username != "") {
        $error = "Username hoặc password không chính xác!!!";
    }
}

if(isset($_GET["logout"])){
    session_destroy();
}
