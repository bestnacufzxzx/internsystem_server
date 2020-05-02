<?php
include_once("config.php");
$postdata = file_get_contents("php://input");
 
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
 
	$id = mysqli_real_escape_string($mysqli, trim($request->id));
	// echo $id;
  $name = mysqli_real_escape_string($mysqli, trim($request->name));
  $pwd = mysqli_real_escape_string($mysqli, (int)$request->pwd);
   $email = mysqli_real_escape_string($mysqli, trim($request->email));
  $mobile = mysqli_real_escape_string($mysqli, (int)$request->mobile);
 
  $sql = "update is_t_citizen set name='$name',pwd='$pwd',email='$email',mobile='$mobile' where Id=$id";
 //echo $sql;
if ($mysqli->query($sql) === TRUE) {
 
 
    $authdata = [
      'name' => $name,
	  'pwd' => '',
	  'email' => $email,
      'mobile' => $mobile,
      'Id'    => ''
    ];
    echo json_encode($authdata);
 
    // CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,BIRTH_DATE FROM is_t_citizen

}
}
?>