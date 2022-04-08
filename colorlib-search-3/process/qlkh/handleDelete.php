<?php

require_once "../../config.php";

if(isset($_GET["delete"])){
    $makh = $_GET['delete'];

    $sql_hd = "SELECT * FROM hopdong WHERE MaKH='$makh'";
    $result = mysqli_query($conn, $sql_hd);

    while($row = $result->fetch_assoc()){
        @unlink("../qlhd/files/" . $row["NoiDungHD"]);
    }



    if($result->num_rows > 0){
        $sql_delte_hd = "DELETE FROM hopdong WHERE MaKH='$makh'";
        mysqli_query($conn, $sql_delte_hd);
    }

    $sql1 = "DELETE FROM khachhang WHERE MaKH='$makh'";
    mysqli_query($conn, $sql1);
    header('Location: http://localhost/colorlib-search-3/qlkh/index.php');
}