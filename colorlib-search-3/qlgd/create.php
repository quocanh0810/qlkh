<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V7</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../ContactFrom_v7/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/css/util.css">
    <link rel="stylesheet" type="text/css" href="../ContactFrom_v7/css/main.css">
    <!--===============================================================================================-->
</head>
<body>


<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Thêm giao dịch
				</span>

            <p style="margin-left: 10px;margin-bottom: 10px;font-size: 16px">Mã giao dịch (*) :</p>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="name" type="text" name="magd">
                <label class="label-input100" for="name">
                    <span class="lnr lnr-user"></span>
                </label>
            </div>

            <p style="margin-left: 10px;margin-bottom: 10px;font-size: 16px">Mã nhân viên (*) :</p>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="name" type="text" name="manv">
                <label class="label-input100" for="email">
                    <span class="lnr lnr-envelope"></span>
                </label>
            </div>

            <p style="margin-left: 10px;margin-bottom: 10px;font-size: 16px">Mã hợp đồng (*) :</p>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="name" type="text" name="mahd">
                <label class="label-input100" for="name">
                    <span class="lnr lnr-user"></span>
                </label>
            </div>

            <p style="margin-left: 10px;margin-bottom: 10px;font-size: 16px">Ngày giao dịch (*) : <span>sssa</span></p>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="phone" type="date" name="ngaygd">
                <label class="label-input100" for="phone">
                    <span class="lnr lnr-phone-handset"></span>
                </label>
            </div>

            <p style="margin-left: 10px;margin-bottom: 10px;font-size: 16px">Nội dung giao dịch (*) :</p>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="phone" type="file" name="noidunggd">
                <label class="label-input100" for="phone">
                    <span class="lnr lnr-phone-handset"></span>
                </label>
            </div>

            <div class="container-contact100-form-btn">
                    <input class="button_1" type="submit" value="Thêm giao dịch">
            </div>
        </form>
    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../ContactFrom_v7/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../ContactFrom_v7/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../ContactFrom_v7/vendor/bootstrap/js/popper.js"></script>
<script src="../ContactFrom_v7/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../ContactFrom_v7/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../ContactFrom_v7/vendor/daterangepicker/moment.min.js"></script>
<script src="../ContactFrom_v7/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../ContactFrom_v7/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../ContactFrom_v7/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
