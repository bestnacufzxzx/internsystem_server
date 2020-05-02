<?php
include_once("config.php");

$sql = "SELECT ID,CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,
        CONCAT(DATE_FORMAT(DATE_ADD(BIRTH_DATE, INTERVAL 0 DAY),'%d/'),
        DATE_FORMAT(DATE_ADD(BIRTH_DATE, INTERVAL 0 MONTH),'%m/'),
        DATE_FORMAT(DATE_ADD(BIRTH_DATE, INTERVAL 543 YEAR),'%Y') ) 
        AS BIRTH_DATE FROM is_t_citizen";
 

if($result = mysqli_query($mysqli,$sql))
{
 $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }
 
  echo json_encode($rows);
}
else
{
  http_response_code(404);
}
?>