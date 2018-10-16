<?php
$connect = new PDO('mysql:host=localhost;dbname=cse485','root','');
$error='';
$comment_name='';
$comment_content='';
$user=$_SESSION['username'];
echo $user;
if(empty($_POST["subject"]))
{
    $error.='<p class="text-danger">Chua nhap tilte!</p>';
}
else
{
    $comment_name =$_POST["subject"];
}
if(empty($_POST["comment_content"]))
{
    $error.='<p class="text-danger">Chua nhap noi dung!</p>';
}
else
{
    $comment_content =$_POST["comment_content"];
}
if($error=='')
{
    $query ="
    insert into comment(parent_comment_id,cm_noidung,cm_subject)
    values (:parent_comment_id,:cm_noidung,:cm_subject)
    ";
    $statement=$connect->prepare($query);
    $statement->execute(
        array(
            ':parent_comment_id' =>'0',
            ':cm_noidung'=>$comment_content,
            ':cm_subject'=> $comment_name
        )
    );
    $error.='<label class="text-success">Comment ok</label>';
}
$data =array(
  'error'=> $error
);
echo json_encode($data)
?>