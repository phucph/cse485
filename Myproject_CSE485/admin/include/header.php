<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../Account/sign_in.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../Account/sign_in.php");
}

?>
<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HongPhuc</title>
    <link rel="stylesheet" href="../../css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="../../css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <!-- -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="../../css/flexslider.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Modernizr JS -->
    <script src="../../js/modernizr-2.6.2.min.js"></script>
    <script src="../../js/jquery-1.9.1.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="../../js/respond.min.js"></script>

    <![endif]-->
    <script>
        $(document).ready(function() {
            //selector đến menu cần làm việc
            var TopFixMenu = $(".ubea-nav");
            // dùng sự kiện cuộn chuột để bắt thông tin đã cuộn được chiều dài là bao nhiêu.
            $(window).scroll(function(){
                // Nếu cuộn được hơn 150px rồi
                if($(this).scrollTop()>150){
                    // Tiến hành show menu ra
                    TopFixMenu.css({'position':'fixed'});
                }else{
                    // Ngược lại, nhỏ hơn 150px thì hide menu đi.
                    TopFixMenu.css({'position':'relative'});
                }}
            );
            $('#comment_from').on('submit',function (event) {
                event.preventDefault();
                var form_data=$(this).serialize();
                $.ajax({
                    url:"add_comment.php",
                    method:"post",
                    data:form_data,
                    dataType:"JSON",
                    success:function (data) {
                        if(data.error !='')
                        {
                                $('#comment_form')[0].reset();
                                $('#comment_message').html(data.error);
                                $('#cm_id').val('0');
                                load_comment();
                        }

                    }
                })
            });

            load_comment();
            function load_comment() {
                $.ajax({
                    url:"fetch_comment.php",
                    method: "post",
                    success:function (data) {
                        $('#display_comment').html(data);
                    }
                })
                
            }
            $(document).on('click', '.reply', function(){
                var comment_id = $(this).attr("id");
                $('#cm_id').val(comment_id);
                $('#subject').focus();
            });
        });
    </script>

</head>
<body>
<div class="ubea-loader"></div>

<div id="page">
    <nav class="ubea-nav" role="navigation">
        <div class="ubea-container">
            <div class="row">
                <div class="col-sm-2 col-xs-12">
                    <div id="ubea-logo"><a href="#"><em>Cộng Đồng Công Nghệ </em></a></div>
                </div>
                <div class="col-xs-10 text-center menu-1 main-nav">
                    <ul>
                        <li class="active"><a href="#" data-nav-section="home">Home</a></li>
                        <li><a href="#" >Kho tài liệu </a></li>
                        <li><a href="#" >Giới Thiệu</a></li>
                        <li><a href="#" >Câu hỏi thường gặp</a></li>
                    </ul>

                </div>
                <div class="nav navbar-right top-nav">
                    <div class="box">
                        <div class="container-1">
                            <span class="icon"><i class="fa fa-search"></i></span>
                            <input type="search" id="search" placeholder="Search..." />
                            <ul class="navbar-right ">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user"></i> Xin chào:&nbsp;<?php echo $_SESSION['username'] ?>
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                                        <li><a href="#"><i class="fa fa-fw fa-gear"></i>Đổi mật khẩu</a></li>
                                        <li><a href="?logout=yes"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

