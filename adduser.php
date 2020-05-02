<?php
include_once("config.php");
// $postdata = file_get_contents("php://input");
$request = json_decode(file_get_contents('php://input'), true); 

// $request = json_decode($postdata);

$datestart = date('Y-m-d H:i:s',time()+21600);

if(empty($request) ){
    echo("ค่าว่าง");
}

    if(isset($request) && !empty($request))
    {
        $CITIZEN_ID = mysqli_real_escape_string($mysqli, (string)$request['CITIZEN_ID']);
        $TITLE = mysqli_real_escape_string($mysqli, (int)$request['TITLE']);
        $FIRST_NAME = mysqli_real_escape_string($mysqli, trim($request['FIRST_NAME']));
        $LAST_NAME = mysqli_real_escape_string($mysqli, trim($request['LAST_NAME']));
        if( (int)($request['SEX']) === 1){
            $SEX = mysqli_real_escape_string($mysqli,'M');
        }else if( (int)($request['SEX']) === 2){
            $SEX = mysqli_real_escape_string($mysqli,'F');
        }
        $BLOOD = mysqli_real_escape_string($mysqli, (int)$request['BLOOD']);
        $BIRTH_DATE = mysqli_real_escape_string($mysqli, trim($request['BIRTH_DATE']));
        $CREATE_DATE = mysqli_real_escape_string($mysqli, trim($datestart));
        $CREATE_BY = mysqli_real_escape_string($mysqli, trim($request['CREATE_BY']));

        $sql = "INSERT INTO is_t_citizen(CITIZEN_ID,TITLE,FIRST_NAME,LAST_NAME,SEX,BLOOD,BIRTH_DATE,CREATE_DATE,CREATE_BY) VALUES ('{$CITIZEN_ID}','{$TITLE}','{$FIRST_NAME}','{$LAST_NAME}','{$SEX}','{$BLOOD}','{$BIRTH_DATE}','{$CREATE_DATE}','{$CREATE_BY}')";
        echo $sql;
    if ($mysqli->query($sql) === TRUE) {
    
    
        $authdata = [
        'CITIZEN_ID' => $CITIZEN_ID,
        'TITLE' => $TITLE,
        'FIRST_NAME' => $FIRST_NAME,
        'LAST_NAME' => $LAST_NAME,
        'SEX'    => $SEX,
        'BLOOD'    => $BLOOD,
        'BIRTH_DATE'    => $BIRTH_DATE,
        'CREATE_DATE'    => $CREATE_DATE,
        'CREATE_BY'    => $CREATE_BY,

        ];
        echo json_encode($authdata);
    
    }
}
?>