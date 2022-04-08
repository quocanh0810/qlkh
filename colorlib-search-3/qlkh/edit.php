<?php
require_once "../config.php";

require_once "../process/qlkh/handleEdit.php";

if (isset($_GET["makh"])) {
    $makh = $_GET["makh"];
    $sql = "SELECT * FROM khachhang WHERE MaKH='$makh'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sser.css"/>
    <title>Document</title>
    <style>
        .red{
            color: red;
        }
    </style>
</head>
<body style="background-color: #efd596">
<div class="container" style="position: relative">

    <form class="well form-horizontal" action="#" method="post" id="contact_form"
          style="margin-top: 50px;">
        <fieldset>
            <!-- Form Name -->
            <legend>Sửa thông tin khách hàng</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Mã khách hàng</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input name="makh" class="form-control" type="text" value="<?php if (isset($_GET["makh"])) {
                            echo $_GET["makh"];
                        } else {
                            echo "";
                        } ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Tên khách hàng</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="tenkh" class="form-control" type="text" required value="<?php if (isset($row)) {
                            echo $row["TenKH"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['tenkh'])){echo $error['tenkh'];}?></span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Quy mô doanh nghiệp</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-equalizer"></i></span>
                        <input name="quymodn" class="form-control" type="text" required value="<?php if (isset($row)) {
                            echo $row["QuyMoDN"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['quymodn'])){echo $error['quymodn'];}?></span>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Lĩnh vực kinh doanh</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                        <input name="linhvuckd" class="form-control" required type="text" value="<?php if (isset($row)) {
                            echo $row["LinhVucKD"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['linhvuckd'])){echo $error['linhvuckd'];}?></span>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Địa chỉ</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="diachi" class="form-control" required type="text" value="<?php if (isset($row)) {
                            echo $row["DiaChi"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['diachi'])){echo $error['diachi'];}?></span>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Số điện thoại</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="sodienthoai" class="form-control" type="text" required value="<?php if (isset($row)) {
                            echo $row["SDT"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['sdt'])){echo $error['sdt'];}?></span>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" class="form-control" type="email" value="<?php if (isset($row)) {
                            echo $row["Email"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="button" id="cancel" class="btn btn-danger">Hủy <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <button type="submit" name="edit" class="btn btn-primary">Gửi <span
                                class="glyphicon glyphicon-ok"></span></button>
                </div>
            </div>

        </fieldset>
    </form>

    <div id="container">
        <div id="success-box">
            <div class="dot"></div>
            <div class="dot two"></div>
            <div class="face">
                <div class="eye"></div>
                <div class="eye right"></div>
                <div class="mouth happy"></div>
            </div>
            <div class="shadow scale"></div>
            <div class="message"><h1 class="alert">Success!</h1>
                <p>Cập nhật thành công</p></div>
        <button class="button-box"><h1 class="green">Home</h1></button>
        </div>

        <div id="error-box">
            <div class="dot"></div>
            <div class="dot two"></div>
            <div class="face2">
                <div class="eye"></div>
                <div class="eye right"></div>
                <div class="mouth sad"></div>
            </div>
            <div class="shadow move"></div>
            <div class="message"><h1 class="alert">Error!</h1>
                <p>oh no, something went wrong.</div>
            <button class="button-box1"><h1 class="red">Có</h1></button>
            <button class="button-box2"><h1 class="red">Không</h1></button>
        </div>
    </div>

</div>
</div><!-- /.container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        if (window.location.href.indexOf("success") > -1) {
            document.getElementById("container").style.display = "block";
            document.getElementById("success-box").style.display = "block";
        }
    });

    $('.button-box').click(function() {
        window.location = "index.php";
    });
</script>
<?php if(isset($success)) : ?>
    <script>
        $('#container').css('display', 'block');
        $('#success-box').css('display', 'block');
        $('.button-box').click(function() {
            window.location = "index.php";
        });
    </script>
<?php endif; ?>
<script>
    $('#cancel').click(function() {
        $('#container').css('display', 'block');
        $('#error-box').css('display', 'block');
    });

    $('.button-box1').click(function() {
        window.location = "index.php";
    });

    $('.button-box2').click(function() {
        $('#container').css('display', 'none');
        $('#error-box').css('display', 'none');
    });

</script>
</body>
</html>
