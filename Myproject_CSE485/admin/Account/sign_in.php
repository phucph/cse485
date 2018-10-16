<?php
include ('sever.php')
?>
<!DOCTYPE html>
<html lang="vn">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị hệ thống</title>
    <!-- Bootstrap Core CSS -->
    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->s
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" >

</head>

    <body>
        <div class="login-form w3_form">
            <div id="logo">
                    <h1 style="color: #cb2027">CSE485</h1>
            </div>
                <!--  Title--> 
            <div class="login-title w3_title" id="nhanve">
                    <h1>DANG NHAP DE THAM GIA</h1>
            </div>
            <div class="login w3_login">
                <h2 class="login-header w3_header">Log in</h2>
                <div class="w3l_grid">
                    <form class="login-container" action="sign_in.php" method="post">
                        <input type="text" placeholder="UserName" Name="username" id="username" required="" >
                        <input type="password" placeholder="Password" Name="password" id="password" required="">
                        <?php include('errors.php'); ?>
                        <input type="submit" value="Submit" name="login_user" class="btn btn-primary">

                    </form>
                    <div class="second-section w3_section">
                        <div class="bottom-header w3_bottom">
                            <h3>OR</h3>
                        </div>
                        <div class="social-links w3_social">
                            <ul>
                                <!-- facebook -->
                                <li> <a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
                                <!-- twitter -->
                                <li> <a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a></li>
                                <!-- google plus -->
                                <li> <a class="googleplus" href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="bottom-text w3_bottom_text">
                        <p>No account yet?<a href="register.php">Signup</a></p>
                        <h4> <a href="#">Forgot your password?</a></h4>
                    </div>
                    </div>
                </div>
            </div>
            <div class="footer-w3l">
                <p class="agile"> &copy;Hong Phuc <a href="#">W3layouts</a></p>
            </div>
    </body>
</html>