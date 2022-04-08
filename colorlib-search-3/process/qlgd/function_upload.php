<?php
//Kiểm tra extension

    function checkExtension($filename , $arrExtension){
        $ext = pathinfo($filename,PATHINFO_EXTENSION); /*Lấy ra phần extension(đuôi file) của biến $filename*/
        $flag = false;
        if(in_array(strtolower($ext),$arrExtension) == true){
            /**
             * strtolower : chuyển hết về dạng chữ thường để ktra
             * in_array : kiểm tra xem extension có trong array hay không?
             * nếu true thì thay đổi biến $flag
             */
            $flag = true;
            return $flag;
        }
    }

// Random File name

function randomString($filename,$length = 5){
    $ext = pathinfo($filename,PATHINFO_EXTENSION); /*Lấy ra phần extension(đuôi file) của biến $filename*/
    $arrCharacter = array_merge(range('A','Z'), range('a','z'), range(0,9));
    $arrCharacter = implode($arrCharacter,'');
    $arrCharacter = str_shuffle($arrCharacter);
    $result =  substr($arrCharacter,0,$length) . '.' .$ext;
    return $result;
}