<?php
    require_once "config.php";
    require_once "process/login/login.php";
?>
<!-- <?php
session_start();
?> -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/loginoutcss.css">
    <script src="https://kit.fontawesome.com/93d337f834.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<h2>Hệ thống thông tin quản lý khách hàng</h2>
<!-- <?php if(isset($_SESSION["error_reg"])){
    echo "<h2 style='color: red;'>" . $_SESSION["error_reg"] . "</h2>";
    unset($_SESSION["error_reg"]);
}elseif (isset($_SESSION["success_reg"])){
    echo "<h2 style='color: red;'>" . $_SESSION["success_reg"] . "</h2>";
    unset($_SESSION["success_reg"]);
}

if(isset($_SESSION["error_log"])){
    echo "<h2 style='color: red;'>" . $_SESSION["error_log"] . "</h2>";
    unset($_SESSION["error_log"]);
}
?> -->


<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form name="login" method="post">
            <h1 style="margin-bottom: 20px">Đăng nhập</h1>
            <input type="text" name="username" placeholder="Username" value=""/>
            <input type="password" name="password" placeholder="Password"  value=""/>
            <a href="#">Quên mật khẩu?</a>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay" style="position: relative;">
            <div class="overlay-panel overlay-right">
                <img style="position:absolute;width: 140%;border-radius:30%" src="images/logo1.png">
            </div>
        </div>
    </div>
</div>
</body>
</html>