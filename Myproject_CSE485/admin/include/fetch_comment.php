<?php
session_start();
$user=$_SESSION['username'];
$connect = new PDO('mysql:host=localhost;dbname=cse485', 'root', '');

$query = "
SELECT * FROM comment
WHERE parent_comment_id = '0'
ORDER BY cm_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
$output .= '
<div class="panel panel-default">
    <div class="panel-heading">Tieu De:  '.$row["cm_subject"].'<br>'.'<b> By '.$user.'</b> on <i>'.$row["cm_date"].'</i></div>
    <div class="panel-body" style="color: #0b0b0b">'.$row["cm_noidung"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["cm_id"].'">Reply</button></div>
</div>
';
$output .= get_reply_comment($connect, $row["cm_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
$query = "
SELECT * FROM comment WHERE parent_comment_id = '".$parent_id."'
";
$output = '';
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$count = $statement->rowCount();
if($parent_id == 0)
{
$marginleft = 0;
}
else
{
$marginleft = $marginleft +5;
}
if($count > 0)
{
foreach($result as $row)
{
$output .= '
<div class="panel panel-default" style="margin-left: '.$marginleft.'px">
    <div class="panel-heading">By <b>'.$row["cm_subject"].'</b> on <i>'.$row["cm_date"].'</i></div>
    <div class="panel-body" style="color: #0b0b0b">'.$row["cm_noidung"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["cm_id"].'">Reply</button></div>
</div>
';
$output .= get_reply_comment($connect, $row["cm_id"], $marginleft);
}
}
return $output;
}

?>