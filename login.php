<?php
  include_once("config.php");
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if(isset($postdata) && !empty($postdata))
    {
      $PASSWORD = mysqli_real_escape_string($mysqli, trim($request->password));
      $USER_NAME = mysqli_real_escape_string($mysqli, trim($request->username));
      $sql='';
      $sql = "SELECT * FROM is_m_user where USER_NAME='$USER_NAME' and PASSWORD='$PASSWORD'";
      if($result = mysqli_query($mysqli,$sql))
      {
        $rows = array();
        if($row = mysqli_fetch_assoc($result))
        {
          $rows[] = $row;
        }
      
        echo json_encode($rows);
      }
      else
      {
        http_response_code(404);
      }
  }
?>