<?php
include("/xampp/htdocs/Sorteo/model/connection.php");

/** Return a matrix from a Query */
function getArrayFromQuery($queryStr,$selectDB=1){
    global $conjpb;
    global $conLottery;
    $conn=$conjpb;
    if($selectDB==2){
        $conn=$conLottery;
    }
    $i=0;
    $query=mysqli_query($conjpb,$queryStr);
    while ($rows = mysqli_fetch_assoc($query)) {
        $result[$i] = $rows;
        $i++;
    }
    if(!is_null($query)){
        return $result ?? '';
    }else{
        return null;
    }
}

/** Return all the parent's id with them sons **/
function getApoAlu(){
    $queryStr="SELECT 
	            *
            FROM
	            alumno_apoderado aa1
            WHERE
	            aa1.apoderado_id <> -1
	            AND
	            aa1.apoderado_id <> -2";
    return getArrayFromQuery($queryStr);
}
?>