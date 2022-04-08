<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/93d337f834.js" crossorigin="anonymous"></script>
    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link rel="stylesheet" href="css/nav.css"/>
    <title>Document</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        /* General button style (reset) */
        .btn {
            border: none;
            font-family: inherit;
            font-size: inherit;
            color: inherit;
            background: none;
            cursor: pointer;
            padding: 25px 80px;
            display: inline-block;
            margin: 15px 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            outline: none;
            position: relative;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        .btn:after {
            content: '';
            position: absolute;
            z-index: -1;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        /* Pseudo elements for icons */
        .btn:before {
            font-family: 'icomoon';
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            position: relative;
            -webkit-font-smoothing: antialiased;
        }
        .icon-star-2:before {
            font-family: "Font Awesome 5 Free";
            content: "\f007";
            font-weight: 900;
        }

        .icon-star-3:before {
            font-family: "Font Awesome 5 Free";
            content: "\f328";
            font-weight: 900;
        }

        /* Button 3 */
        .btn-3 {
            background: -webkit-linear-gradient(left, #86c6f1, #9acfd7);
            background: linear-gradient(to right, #86c6f1, #9acfd7);
            color: #fff;
        }

        .btn-3:hover {
            background: -webkit-linear-gradient(left, #def3eb, #9acfd7);
            background: linear-gradient(to right, #def3eb, #9acfd7);
        }

        .btn-3:active {
            background: -webkit-linear-gradient(left, #6cf6ef, #9acfd7);
            background: linear-gradient(to right, #6cf6ef, #9acfd7);
            top: 2px;
        }

        .btn-3:before {
            position: absolute;
            height: 100%;
            left: 0;
            top: 0;
            line-height: 3;
            font-size: 140%;
            width: 60px;
        }

        /* Button 3b */
        .btn-3b {
            padding: 25px 60px 25px 120px;
            border-radius: 10px;
        }

        .btn-3b:before {
            border-right: 2px solid rgba(255,255,255,0.5);
        }

    </style>
</head>
<body style="background: #F6F5F7;">
    <section>
        <nav class="circle">
            <ul>
                <li><a href="../trangchu.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Download</a></li>
                <li>
                    <?php if(isset($_SESSION["user"])) :?>
                        <?php echo '<a href="#"><i class="fas fa-user">' . '    ' . $_SESSION["user"]["username"] .'</i></a></li>'?>
                <li><a href="login.php?logout">Log out</a></li>
                    <?php else: ?>
                        <a href="login.php">Log In</a>
                    <?php endif; ?></li>
            </ul>
        </nav>
    </section>

<div style="margin: 50px">
    <div class="btns" style="display: flex;justify-content: center">
        <button class="btn btn-3 btn-3b icon-star-2" onclick="window.location.href='http://localhost/colorlib-search-3/qlkh/index.php'" >Quản lý khách hàng</button>
        <button class="btn btn-3 btn-3b icon-star-3" onclick="window.location.href='http://localhost/colorlib-search-3/qlhd/index.php'" >Quản lý hợp đồng</button>
        <button class="btn btn-3 btn-3b icon-star-3" onclick="window.location.href='http://localhost/colorlib-search-3/qlgd/index.php'" >Quản lý giao dịch</button>
        <button class="btn btn-3 btn-3b icon-star-3" onclick="window.location.href='http://localhost/colorlib-search-3/qlhd/index.php'" >Thống kê báo cáo</button>
    </div>
</div>
</div>
</body>
</html>