<?php
include_once("config.php");
$request = json_decode(file_get_contents('php://input'), true); 
$updateday = date('Y-m-d H:i:s',time()+21600);
 
if(isset($request) && !empty($request))
{
   
 
  $ID = mysqli_real_escape_string($mysqli, (int)$request['ID']);
  $CITIZEN_ID = mysqli_real_escape_string($mysqli, (string)$request['CITIZEN_ID']);
  $TITLE = mysqli_real_escape_string($mysqli, (int)$request['TITLE']);
  $FIRST_NAME = mysqli_real_escape_string($mysqli, trim($request['FIRST_NAME']));
  $LAST_NAME = mysqli_real_escape_string($mysqli, trim($request['LAST_NAME']));
  $SEX = mysqli_real_escape_string($mysqli, trim($request['SEX']));
  $BLOOD = mysqli_real_escape_string($mysqli, (int)$request['BLOOD']);
  $BIRTH_DATE = mysqli_real_escape_string($mysqli, trim($request['BIRTH_DATE']));
  $UPDATE_DATE = mysqli_real_escape_string($mysqli, trim($updateday));
  $UPDATE_BY = mysqli_real_escape_string($mysqli, trim($request['USER_NAME']));


  
 
  $sql = "update is_t_citizen set CITIZEN_ID='$CITIZEN_ID',TITLE='$TITLE',FIRST_NAME='$FIRST_NAME',LAST_NAME='$LAST_NAME',SEX='$SEX',BLOOD='$BLOOD',BIRTH_DATE='$BIRTH_DATE',UPDATE_DATE='$UPDATE_DATE',UPDATE_BY='$UPDATE_BY' where ID=$ID";
 //echo $sql;
//  CREATE_DATE='$CREATE_DATE',CREATE_DATE='$CREATE_DATE', CREATE_BY='$CREATE_BY'
if ($mysqli->query($sql) === TRUE) {
 
 
    $authdata = [
      'ID' => $ID,
      'CITIZEN_ID' => $CITIZEN_ID,
	    'TITLE' => $TITLE,
	    'FIRST_NAME' => $FIRST_NAME,
      'LAST_NAME' => $LAST_NAME,
      'SEX' => $SEX,
      'BLOOD' => $BLOOD,
      'BIRTH_DATE' => $BIRTH_DATE,
      'UPDATE_DATE' => $UPDATE_DATE,
      'UPDATE_BY' => $UPDATE_BY,
    ];
    echo json_encode($authdata);
 
    // CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,BIRTH_DATE FROM is_t_citizen

}
}
?>