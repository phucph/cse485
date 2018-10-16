<?php
session_start();
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
        jQuery(document).ready(function($) {
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
            )
        })
    </script>

</head>
<body>

