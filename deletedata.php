<?php
include_once("config.php");
 
 
if($_GET["id"] !="")
{
 
$id=$_GET["id"];
 
  $sql = "delete from is_t_citizen  WHERE ID = '{$id}' LIMIT 1";
 
  if(mysqli_query($mysqli, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
?>