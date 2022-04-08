<?php
require_once "../config.php";

session_start();

//Select all data
$sql = "SELECT * FROM hopdong";
$result = mysqli_query($conn, $sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}

if(isset($_POST["search"])){
    $search_text = $_POST["search_text"];
    $search_id = $_POST["search_id"];
    if($search_id == "mahd"){
        $sql_search = "SELECT * FROM hopdong WHERE MaHD LIKE '$search_text%'";
    }
    if($search_id == "tenhd"){
        $sql_search = "SELECT * FROM hopdong WHERE TenHD LIKE '$search_text%'";
    }

    $result2 = mysqli_query($conn, $sql_search);

}
if(isset($result2)){
    if($result2->num_rows > 0){
        while($row1 = $result2->fetch_assoc()){
            $data1[] = $row1;
        }
    }else{
        $null = 'Không tìm thấy kết quả';
    }
}

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="colorlib.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet"/>
    <link href="../css/confirmdelete.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/nav.css"/>
    <link href="../css/sser.css" rel="stylesheet"/>
    <style>
        a.a_ok{
            display: block;
            color: black;
            border: 2px solid black;
            width: 100px;
            margin: 0 auto;
            border-radius: 30px;
            background-color: red;
            text-decoration: none;
            box-shadow: 1px 1px #888888;
        }

        a.a_ok:hover{
            background-color: #EF8D9C;
        }
    </style>
</head>
<body>
<section style="margin: 0;height: 62px">
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

<div class="s003">
    <h2 style="text-align: center;margin-bottom: 40px;margin-top: 40px;font-weight: bolder">Danh sách giao dịch</h2>
    <form action="#" method="post">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="input-select">
                    <select data-trigger="" name="search_id">
                        <option value="mahd">Mã hợp đồng</option>
                        <option value="tenhd">Tên hợp đồng</option>
                    </select>
                </div>
            </div>
            <div class="input-field second-wrap">
                <input id="search" name="search_text" type="text" placeholder="Nhập từ khóa tìm kiếm"/>
            </div>
            <div class="input-field third-wrap">
                <button class="btn-search" name="search" type="submit">
                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                         data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                              d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </form>
    <section style="border-radius: 10px;">
        <div class="tbl-header">
            <table>
                <thead>
                <tr>
                    <th>Mã HĐ</th>
                    <th>Tên HĐ</th>
                    <th>Mã KH</th>
                    <th>Mã NV</th>
                    <th>Nội dung</th>
                    <th>Tình trạng</th>
                    <th>Ngày kí</th>
                    <th>Ngày kiểm tra</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                <?php if(isset($data1)) : ?>
                    <?php if(isset($data1)) :?>
                        <?php foreach ($data1 as $key=>$post) :?>
                            <tr>
                                <td><?php echo $post["MaHD"]; ?></td>
                                <td><?php echo $post["TenHD"]; ?></td>
                                <td><?php echo $post["MaKH"]; ?></td>
                                <td><?php echo $post["MaNV"]; ?></td>
                                <td><a href="C:/xampp/htdocs/colorlib-search-3/process/qlhd/files/<?php echo $post["NoiDungHD"]; ?>"</td>
                                <td><?php echo $post["TinhTrangHD"]; ?></td>
                                <td><?php $date_format = date('d-m-Y', strtotime($post['NgayKi'])); echo $date_format; ?></td>
                                <td><?php echo $post["NgayKT"]; ?></td>
                                <td>
                                    <a href="edit.php?mahd=<?php echo $post["MaHD"];?>" class="btn btn-primary" style="margin-right: 15px" ><i class="fas fa-edit"></i></a>
                                    <a href="#" data-id="<?php echo $post["MaHD"]?>" data-hd="<?php echo $post["NoiDungHD"]?>" data-target="#delete-client-modal" class="btn btn-danger clickDelete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="create.php" class="btn btn-primary create" style="margin-right: 15px"><i class="fas fa-plus-circle"></i> Thêm giao dịch</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php elseif (isset($null)) : ?>
                <div id="container" style="display: block">
                    <div id="error-box" style="display: block">
                        <div class="dot"></div>
                        <div class="dot two"></div>
                        <div class="face2">
                            <div class="eye"></div>
                            <div class="eye right"></div>
                            <div class="mouth sad"></div>
                        </div>
                        <div class="shadow move"></div>
                        <div class="message"><h1 class="alert">Hệ thống</h1>
                            <p>Không tìm thấy kết quả</div>
                        <button class="button-box"><h1 class="red">OK</h1></button>
                    </div>
                    <?php else:  ?>
                        <?php if(isset($data)) :?>
                            <?php foreach ($data as $key=>$post) :?>
                                <tr>
                                    <td><?php echo $post["MaHD"]; ?></td>
                                    <td><?php echo $post["TenHD"]; ?></td>
                                    <td><?php echo $post["MaKH"]; ?></td>
                                    <td><?php echo $post["MaNV"]; ?></td>
                                    <td><a href="/colorlib-search-3/process/qlhd/files/<?php echo $post["NoiDungHD"]; ?>"><?php echo $post["NoiDungHD"]; ?></a></td>
                                    <td><?php echo $post["TinhTrangHD"]; ?></td>
                                    <td><?php $date_format = date('d-m-Y', strtotime($post['NgayKi'])); echo $date_format; ?></td>
                                    <td><?php $date_format = date('d-m-Y', strtotime($post['NgayKT'])); echo $date_format; ?></td>
                                    <td>
                                        <a href="edit.php?mahd=<?php echo $post["MaHD"];?>" class="btn btn-primary" style="margin-right: 15px" ><i class="fas fa-edit"></i></a>
                                        <a href="#" data-id="<?php echo $post["MaHD"]?>" data-hd="<?php echo $post["NoiDungHD"]?>" data-target="#delete-client-modal" class="btn btn-danger clickDelete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="9" style="text-align: center">
                                    <a class="create1" href="create.php"><i class="fas fa-plus-circle" style="color: #007bff">      Thêm giao dịch</i></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
    <div>
        <div class="deleteConfirmed" style="display:none;">
            <span class="close">×</span>
            <div class="delete-box">
                <span class="close-icon">×</span>
                <h5>Bạn có chắc muốn xóa hợp đồng này không?</h5>
            </div>
            <div class="btn-group" style="margin-bottom: 30px">
                <button class="red delete-btn" style="margin-right: 40px" onclick="deleteFunction()">Yes</button>
                <button class="green close">No</button>
            </div>
        </div>
        <div id="success">
            <strong>Success!</strong>
        </div>
    </div>
</div>
<script src="../js/extention/choices.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $('.button-box').click(function() {
        window.location = "index.php";
    });
</script>
<script type="text/javascript">
    $('.clickDelete').each(function () {
        var $this = $(this);
        $this.on("click", function () {
            $('.deleteConfirmed').show();
            var id = $(this).data('id');
            var hd = $(this).data('hd');
            $('.delete-btn').click(function(){
                window.location = "http://localhost/colorlib-search-3/process/qlhd/handleDelete.php?delete=" + id + "&hd=" + hd;
            });
        });
    });

    $('.close').click(function(){
        $('.deleteConfirmed').hide();
    });

    $('.delete-btn').click(function(){
        $('.alert-success').show();
    });

    function deleteFunction() {
        var x = document.getElementById("success");
        x.className = "showSucess";
        setTimeout(function(){x.className = x.className.replace("showSucess", ""); }, 4000);
        $('.deleteConfirmed').hide();

    }
</script>
<script>
    $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
</script>
<script>
    const choices = new Choices('[data-trigger]',
        {
            searchEnabled: false,
            itemSelectText: '',
        });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
