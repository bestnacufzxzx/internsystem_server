<?php
include_once("config.php");
 
$postdata = file_get_contents("php://input");
$empid=$_GET["empid"];
 
$sql="SELECT ID, CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,BIRTH_DATE,CREATE_DATE,CREATE_BY FROM is_t_citizen where ID='$empid'";
 
 
if($result = mysqli_query($mysqli,$sql))
{
//  $rows = array();
//   while($row = mysqli_fetch_assoc($result))
//   {
//     $rows[] = $row;
//   }
 
  echo json_encode( mysqli_fetch_assoc($result));
}
else
{
  http_response_code(404);
}
?>