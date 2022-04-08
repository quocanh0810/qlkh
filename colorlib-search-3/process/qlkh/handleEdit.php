<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $makh = $_POST['makh'];
    $tenkh = $_POST['tenkh'];
    $quymodn = $_POST['quymodn'];
    $linhvuckd = $_POST['linhvuckd'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];

    $flag = "true";
    $error = array();

    $patterntenkh = "/[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/";
    $patteronlytext = "/[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{3,20}$/";
    $patterndiachi =  "/[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]*$/";
    $patternsdt = "/^[0-9]{10}$/";


    if(preg_match($patterntenkh,$tenkh) == false){
        $flag = "false";
        $error['tenkh'] = "Tên khách hàng chỉ bao gồm chữ";
    }

    if(preg_match($patteronlytext,$quymodn) == false){
        $flag = "false";
        $error['quymodn'] = "Quy mô doanh nghiệp chỉ bao gồm chữ từ 3-20 ký tự";
    }

    if(preg_match($patteronlytext,$linhvuckd) == false){
        $flag = "false";
        $error['linhvuckd'] = "Lĩnh vực kinh doanh chỉ bao gồm chữ từ 3-20 ký tự";
    }

    if(preg_match($patterndiachi,$diachi) == false){
        $flag = "false";
        $error['diachi'] = "Địa chỉ bao gồm chữ";
    }

    if(preg_match($patternsdt,$sodienthoai) == false){
        $flag = "false";
        $error['sdt'] = "Số điện thoại bao gồm số và 10 ký tự";
    }

    if($flag == "true"){
        $sql1 = "UPDATE khachhang SET TenKH = '$tenkh' ,QuyMoDN = '$quymodn',LinhVucKD = '$linhvuckd',DiaChi ='$diachi',SDT = '$sodienthoai',Email = '$email' WHERE MaKH='$makh'";
        mysqli_query($conn, $sql1);
        $success = "success";
    }
}