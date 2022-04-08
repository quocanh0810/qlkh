<?php

require_once 'function_upload.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $mahd = $_POST['mahd'];
    $tenhd = $_POST['tenhd'];
    $makh = $_POST['makh'];
    $manv = $_POST['manv'];
    $tinhtranghd = $_POST['tinhtranghd'];
    $noidunghd = $_POST['noidunghd_text'];

    $ngayki = $_POST['ngayki'];
    $ngaykt = $_POST['ngaykt'];
    $dateo_format_ki = date('Y-m-d', strtotime($ngayki));
    $dateo_format_kt = date('Y-m-d', strtotime($ngaykt));

    $flag = "true";
    $error = array();

    $patternmahd = "/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{3,10}$/";
    $sql_mahd = "SELECT * FROM hopdong WHERE MaHD='$mahd'";
    $result_mahd = mysqli_query($conn, $sql_mahd);

    $sql_makh = "SELECT * FROM khachhang WHERE MaKH='$makh'";
    $result_makh = mysqli_query($conn, $sql_makh);

    $sql_manv = "SELECT * FROM nhanvien WHERE MaNV='$manv'";
    $result_manv = mysqli_query($conn, $sql_manv);


    $patterntenhd = "/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]*$/";
    $pattertthd = "/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{6,20}$/";


    if($result_makh->num_rows == 0){
        $flag = "false";
        $error['makh'] = "Mã khách hàng không tồn tại";
    }


    if($result_manv->num_rows == 0){
        $flag = "false";
        $error['manv'] = "Mã nhân viên không tồn tại";
    }



    if(preg_match($patterntenhd,$tenhd) == false){
        $flag = "false";
        $error['tenhd'] = "Tên hợp đồng không vượt quá 30 kí tự";
    }


    //File PDF - Validate

    if(isset($_FILES['noidunghd']) && $_FILES['noidunghd']["name"] != null){
        $fileUpload = $_FILES['noidunghd'];

        $filename = randomString($fileUpload['name'],7);

        $flagExtension = checkExtension($fileUpload['name'], array('pdf'));

        if ($flagExtension == true) {
            @unlink('../process/qlhd/files/'. $noidunghd);
            @move_uploaded_file($fileUpload['tmp_name'],'../process/qlhd/files/'. $filename);
            $flag = "true";
        }else{
            $flag = "false";
            $error['noidunghd'] = "File hợp đồng phải ở định dạng pdf";
        }
    }



    if(preg_match($pattertthd,$tinhtranghd) == false){
        $flag = "false";
        $error['tinhtranghd'] = "Tình trạng hợp đồng chỉ bao gồm chữ từ 6-20 ký tự";
    }

    if(isset($fileUpload)){
        if($flag == "true"){
            $sql1 = "UPDATE hopdong SET TenHD = '$tenhd',MakH = '$makh' ,MaNV = '$manv' ,NoiDungHD = '$filename',TinhTrangHD = '$tinhtranghd' ,NgayKi = '$dateo_format_ki',NgayKT = '$dateo_format_kt' WHERE MaHD='$mahd'";
            mysqli_query($conn, $sql1);
            $success = "success";
        }
    }else{
        if($flag == "true"){
            $sql1 = "UPDATE hopdong SET TenHD = '$tenhd',MakH = '$makh' ,MaNV = '$manv' ,TinhTrangHD = '$tinhtranghd' ,NgayKi = '$dateo_format_ki',NgayKT = '$dateo_format_kt' WHERE MaHD='$mahd'";
            mysqli_query($conn, $sql1);
            $success = "success";
        }
    }

}