<?php
require_once "../config.php";

require_once "../process/qlhd/handleEdit.php";

if (isset($_GET["mahd"])) {
    $mahd = $_GET["mahd"];
    $sql = "SELECT * FROM hopdong WHERE MaHD='$mahd'";
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

    <form class="well form-horizontal" action="#" method="post" id="contact_form" style="margin-top: 50px;" enctype="multipart/form-data">
        <fieldset>
            <!-- Form Name -->
            <legend>Sửa thông tin hợp đồng</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Mã hợp đồng</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input name="mahd" class="form-control" type="text" value="<?php if (isset($_GET["mahd"])) {
                            echo $_GET["mahd"];
                        } else {
                            echo "";
                        } ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Tên hợp đồng</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="tenhd" class="form-control" type="text" required value="<?php if (isset($row)) {
                            echo $row["TenHD"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['tenhd'])){echo $error['tenhd'];}?></span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Mã khách hàng</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-equalizer"></i></span>
                        <input name="makh" class="form-control" type="text" required value="<?php if (isset($row)) {
                            echo $row["MaKH"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['makh'])){echo $error['makh'];}?></span>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Mã nhân viên</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                        <input name="manv" class="form-control" required type="text" value="<?php if (isset($row)) {
                            echo $row["MaNV"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['manv'])){echo $error['manv'];}?></span>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Nội dung HĐ</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="noidunghd" class="form-control" type="file">
                        <input name="noidunghd_text" class="form-control" type="text" value="<?php if (isset($row)) {
                            echo $row["NoiDungHD"];
                        } else {
                            echo "";
                        } ?>" readonly>
                    </div>
                    <span class="red"><?php if(isset($error['noidunghd'])){echo $error['noidunghd'];}?></span>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Tình trạng hợp đồng</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="tinhtranghd" class="form-control" type="text" required value="<?php if (isset($row)) {
                            echo $row["TinhTrangHD"];
                        } else {
                            echo "";
                        } ?>">
                    </div>
                    <span class="red"><?php if(isset($error['tinhtranghd'])){echo $error['tinhtranghd'];}?></span>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Ngày Kí</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="ngayki" class="form-control" type="date" value="<?php echo $row["NgayKi"]; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Ngày Kí</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="ngaykt" class="form-control" type="date" value="<?php echo $row["NgayKT"]; ?>">
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="button" id="cancel" class="btn btn-danger">Hủy <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <input type="submit" name="edit" class="btn btn-primary">
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
            <div class="message"><h1 class="alert">Hệ thống</h1>
                <p>Bạn có chắc chắn muốn dừng công việc này lại không?</div>
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
