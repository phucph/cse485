<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$host='localhost';
$user='root';
$pass='';
$db='cse485';
// ket noi server
$db=mysqli_connect($host,$user,$pass,$db);
if(!$db){
    die('ket noi khong thanh cong :'.mysqli_connect_error());
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  /*  if(($_FILES['img']['type']!="image/gif")
            &&($_FILES['img']['type']!="image/png")
            &&($_FILES['img']['type']!="image/jpeg")
            &&($_FILES['img']['type']!="image/jpg")
    )
    {
        $message="File không đúng định dạng";
    }
    elseif ($_FILES['img']['size']>10000000)
        {
        $message="Kích thước phải nhỏ hơn 10MB";
    }
    elseif($_FILES['img']['size']=='')
        {
        $message="Bạn chưa chọn file ";
    }
    else
        {
            $img=$_FILES['img']['name'];
            $links_img='upload/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$img);
        }
  */
    $name= mysqli_real_escape_string($db, $_POST['fullname']);
    $email=mysqli_real_escape_string($db, $_POST['email']);
    $role=mysqli_real_escape_string($db, $_POST['role']);
    // form validation: ensure that the form is correctly filled
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);
        $options = array("cost" => 10, "salt" =>random_bytes(22));
        $hash = password_hash($password, PASSWORD_BCRYPT);
        echo $hash;
        //encrypt the password before saving in the database
        $query = "INSERT INTO account (acc_usename,acc_pass,acc_fullname,acc_email,acc_role,acc_salt) 
					  VALUES('$username', '$hash', '$name','$email','$role','".$options['salt']."')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Ban co muon dang nhap ngay !";
       // header('location: sign_in.php');
    }

}
/*
 * reset lai identity
 SET  @num := 0;

UPDATE your_table SET id = @num := (@num+1);

ALTER TABLE your_table AUTO_INCREMENT =1;
 */

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM account WHERE acc_usename='$username' AND acc_pass='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Ban co muon dang nhap luon khong?";
            header('location:../include/menu.php');
        }else {
            array_push($errors, "Username/PassWord Khong hop le");
        }
    }
}

?>