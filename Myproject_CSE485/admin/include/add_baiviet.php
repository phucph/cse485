<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản trị hệ thống</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">QUẢN TRỊ HỆ THỐNG</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Xin chào:&nbsp;admin <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i>Đổi mật khẩu</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="../Account/sign_in.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li style="background:#1b926c;color:#fff;">
                    <a href="QuanTri.php" style="color:#fff;"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo_dm"><i class="fa fa-fw fa-file"></i> Danh mục bài viết <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo_dm" class="collapse">
                        <li>
                            <a href="#">Thêm mới</a>
                        </li>
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo_bv"><i class="fa fa-fw fa-file"></i> Bài viết <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo_bv" class="collapse">
                        <li>
                            <a href="../include/add_baiviet.php">Thêm mới</a>
                        </li>
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo_dm"><i class="fa fa-fw fa-file"></i> Hỗ trợ trực tuyến <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo_dm" class="collapse">
                        <li>
                            <a href="#">Thêm mới</a>
                        </li>
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo_dm"><i class="fa fa-fw fa-file"></i> Slider <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo_dm" class="collapse">
                        <li>
                            <a href="#">Thêm mới</a>
                        </li>
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo_vd"><i class="fa fa-fw fa-file"></i> Video <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo_vd" class="collapse">
                        <li>
                            <a href="#">Thêm mới</a>
                        </li>
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">


        <div class="container-fluid">

            <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-sm-12">


                <div class="col-lg-12">
                    <h1 class="page-header">
                        Danh sách <small>bình luận</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
                    <h3> Thêm Mới Slider </h3>
                    <div class="form_group">
                        <label>Title </label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php if (isset($_POST['title'])) {echo $_POST['title'];} ?>">
                        <?php if (isset($errors) && in_array('title',$errors))

                        {
                            echo "<p class='required'>Bạn chưa nhập title</p>";
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label>Ảnh</label>
                        <input type="file" name="img" value="">
                    </div>
                    <div class="form_group">
                        <label>Link</label>
                        <input type="text" name="link" value="<?php if (isset($_POST['link'])) {echo $_POST['link'];} ?>" class="form-control" placeholder="Slider">
                        <?php if (isset($errors) && in_array('link',$errors))

                        {
                            echo "<p class='required'>Bạn chưa nhập link</p>";
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label>Noi Dung</label>
                        <input type="text" value="<?php if (isset($_POST['ordernum'])) {echo $_POST['ordernum'];}?>" name="ordernum" class="form-control" placeholder="Noi Dung Bai Viet" >
                    </div>
                    <div class="form_group">
                        <label style="display:block; ">Trang Thai </label>

                        <label class="radio-inline"><input type="radio" checked="checked" name="status" value="1">Hiển thị </label>
                        <label class="radio-inline"><input type="radio" name="status" value="0"> Ẩn </label>
                    </div>
                    <div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Thêm Mới">
                    </div>
                    </form>
                </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <div id="footer">
        <p>hahaha</p>
    </div>
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../../js/plugins/morris/raphael.min.js"></script>
<script src="../../js/plugins/morris/morris.min.js"></script>
<script src="../../js/plugins/morris/morris-data.js"></script>

</body>

</html>
