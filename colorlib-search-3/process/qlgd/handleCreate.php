<?php

require_once 'function_upload.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $magd = $_POST['magd'];
    $manv = $_POST['manv'];
    $mahd = $_POST['mahd'];
    $ngaygd = $_POST['ngaygd'];
    $dateo_format_ngaygd = date('Y-m-d', strtotime($ngaygd));

    $ndgd = $_POST['ndgd'];

    $flag = "true";
    $error = array();

    $patternmagd = "/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{3,10}$/";
    $sql_magd = "SELECT * FROM giaodich WHERE MaGD='$magd'";
    $result_magd = mysqli_query($conn, $sql_magd);

    $patternmanv = "/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{3,10}$/";
    $sql_manv = "SELECT * FROM giaodich WHERE MaNV='$manv'";
    $result_manv = mysqli_query($conn, $sql_manv);

    $patternmahd = "/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{3,10}$/";
    $sql_mahd = "SELECT * FROM giaodich WHERE MaHD='$mahd'";
    $result_mahd = mysqli_query($conn, $sql_mahd);


    if(preg_match($patternmagd,$magd) == false){
        $flag = "false";
        $error['magd'] = "Mã giao dịch chỉ bao gồm chữ và số từ 3 đến 10 ký tự";
    }elseif($result_magd->num_rows > 0){
        $flag = "false";
        $error['magd'] = "Mã giao dịch đã tồn tại";
    }

    if(preg_match($patternmanv,$manv) == false){
        $flag = "false";
        $error['manv'] = "Mã nhân viên chỉ bao gồm chữ và số từ 3 đến 10 ký tự";
    }elseif($result_manv->num_rows > 0){
        $flag = "false";
        $error['manv'] = "Mã nhân viên đã tồn tại";
    }

    if(preg_match($patternmahd,$mahd) == false){
        $flag = "false";
        $error['mahd'] = "Mã hợp đồng chỉ bao gồm chữ và số từ 3 đến 10 ký tự";
    }elseif($result_mahd->num_rows > 0){
        $flag = "false";
        $error['mahd'] = "Mã hợp đồng đã tồn tại";
    }

    //File PDF - Validate

    if(isset( $_FILES['noidunggd'])){
        $fileUpload = $_FILES['noidunggd'];

        $filename = randomString($fileUpload['name'],7);

        $flagExtension = checkExtension($fileUpload['name'], array('pdf'));

        if ($flagExtension == true) {
            if($flag == "true"){
                @move_uploaded_file($fileUpload['tmp_name'],'../process/qlgd/files/'. $filename);
            }
        }else{
            $flag = "false";
            $error['noidunggd'] = "File nội dung giao dịch phải ở định dạng pdf";
        }
    }


    if($flag == "true"){
        $sql1 = "INSERT INTO giaodich (MaGD,MaNV,MaHD,NgayGD,NoiDungGD) VALUES ('$magd','$manv','$mahd','$dateo_format_ngaygd','$ndgd')";
        mysqli_query($conn, $sql1);
        $success = "success";
    }

}