<?php
include_once("config.php");
 
$postdata = file_get_contents("php://input");

if(!empty($_GET["CITIZEN_ID"]) || !empty($_GET["TITLE"]) || !empty($_GET["SEX"]) || !empty($_GET["BLOOD"]) ){
  $CITIZEN_ID = mysqli_real_escape_string($mysqli, ($CITIZEN_ID = $_GET["CITIZEN_ID"]));
  $TITLE = mysqli_real_escape_string($mysqli, ($TITLE = $_GET["TITLE"]));
  $SEX = mysqli_real_escape_string($mysqli, ($SEX = $_GET["SEX"]));
  $FIRST_NAME = mysqli_real_escape_string($mysqli, ($FIRST_NAME = $_GET["FIRST_NAME"]));
  $LAST_NAME = mysqli_real_escape_string($mysqli, ($LAST_NAME = $_GET["LAST_NAME"]));
  $dpFromDate = mysqli_real_escape_string($mysqli, ($dpFromDate = $_GET["dpFromDate"]));
  $dpToDate = mysqli_real_escape_string($mysqli, ($dpToDate = $_GET["dpToDate"]));

  if( (int)($SEX ) === 1){ $SEX = 'M';
  }else if( (int)($SEX ) === 2){ $SEX = 'F';}

  $BLOOD = mysqli_real_escape_string($mysqli, ($BLOOD = $_GET["BLOOD"]));
  // $sql="SELECT ID,CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,BIRTH_DATE FROM is_t_citizen where 1=1";
  // if($CITIZEN_ID !== ''){
  //   $sql = $sql + " AND (CITIZEN_ID LIKE '$CITIZEN_ID%')"
  // }

  $sql = "  SELECT  ID,CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,
            CONCAT(DATE_FORMAT(DATE_ADD(BIRTH_DATE, INTERVAL 0 DAY),'%d/'),
            DATE_FORMAT(DATE_ADD(BIRTH_DATE, INTERVAL 0 MONTH),'%m/'),
            DATE_FORMAT(DATE_ADD(BIRTH_DATE, INTERVAL 543 YEAR),'%Y') ) 
            AS BIRTH_DATE
            FROM is_t_citizen where 1=1";
  if($CITIZEN_ID != 'null'){
    $sql = $sql . " AND CITIZEN_ID 
                    LIKE '$CITIZEN_ID%'" ;
  } 
  if ($TITLE != 'null'){
    $sql = $sql . " AND TITLE = '$TITLE'";
  }
  if ($SEX != 'null'){
    $sql = $sql . " AND SEX = '$SEX'";
  }
  if ($BLOOD != 'null'){
    $sql = $sql . " AND BLOOD = '$BLOOD'";
  }
  if ($FIRST_NAME != 'null'){
    $sql = $sql . " AND FIRST_NAME LIKE '%$FIRST_NAME%'";
  }
  if ($LAST_NAME != 'null'){
    $sql = $sql . " AND LAST_NAME LIKE '%$LAST_NAME%'";
  }          

  if(($dpFromDate) != 'null'){ 
      $sql = $sql . " AND BIRTH_DATE >= '$dpFromDate'";
  }

  if(($dpToDate) != 'null'){ 
      $sql = $sql . "  AND BIRTH_DATE <= '$dpToDate'";
  }
  
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


}

?>