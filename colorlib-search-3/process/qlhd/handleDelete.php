<?php

require_once "../../config.php";

if(isset($_GET["delete"])){
    $mahd = $_GET['delete'];
    $hd = $_GET['hd'];

    @unlink("../qlhd/files/" . $hd);
    $sql1 = "DELETE FROM hopdong WHERE MaHD='$mahd';";
    mysqli_query($conn, $sql1);
    header('Location: http://localhost/colorlib-search-3/qlhd/index.php');
}