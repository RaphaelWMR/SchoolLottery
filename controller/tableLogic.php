<?php
include("/xampp/htdocs/Sorteo/model/connection.php");

/** Return a matrix from a Query */
function getArrayFromQuery($queryStr, $selectDB = 1)
{
    global $conjpb;
    global $conLottery;
    $conn = $conjpb;
    if ($selectDB == 2) {
        $conn = $conLottery;
    }
    $i = 0;
    $query = mysqli_query($conjpb, $queryStr);
    while ($rows = mysqli_fetch_assoc($query)) {
        $result[$i] = $rows;
        $i++;
    }
    if (!is_null($query)) {
        return $result ?? '';
    } else {
        return null;
    }
}

/** Return all the students */
function getStudents()
{
    $queryStr = " SELECT alumno_id AS 'ID',
                    alumno_ap AS 'AP',
                    alumno_am AS 'AM',
                    alumno_nombres AS 'Nombres',
                    alumno_ndoc AS '# Documento',
                    grado.grado_descripcion AS 'Aula'
                    FROM alumno
                    JOIN aula_academica ON alumno.aa_id = aula_academica.aa_id
                    JOIN grado ON aula_academica.grado_id = grado.grado_id
                    WHERE alumno.estado=1
                    ORDER BY alumno.aa_id;
                    ";
    return getArrayFromQuery($queryStr);
}

/**Return the data of a student */
function getStudentData($id){
    $queryStr=" SELECT alumno_id AS 'ID',
                alumno_ap AS 'AP',
                alumno_am AS 'AM',
                alumno_nombres AS 'Nombres',
                alumno_ndoc AS '# Documento',
                grado.grado_descripcion AS 'Aula'
                FROM alumno
                JOIN aula_academica ON alumno.aa_id = aula_academica.aa_id
                JOIN grado ON aula_academica.grado_id = grado.grado_id
                WHERE alumno.alumno_id=".$id.";";
    return getArrayFromQuery($queryStr);
}