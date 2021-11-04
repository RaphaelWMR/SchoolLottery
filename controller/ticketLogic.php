<?php
require_once("/xampp/htdocs/Sorteo/controller/tableLogic.php");

/** Add Digits */
function addDigits($number, $digits, $character = "0")
{
    $number = strval($number);
    $strlen = strlen($number);
    $zeroStr = "";
    for ($i = 0; $i < $digits - $strlen; $i++) {
        $zeroStr = $zeroStr . $character;
    }
    return $zeroStr . $number;
}

/*Insert a ticket */
function newTicket($alumno_id, $month_id)
{
    global $conLottery;
    if (!existTicket($alumno_id, $month_id)) {
        $queryStr = " INSERT INTO 
                    `ticket` 
                    (`ticket_id`, `alumno_id`, `month_id`) 
                    VALUES 
                    (NULL, '" . $alumno_id . "', '" . $month_id . "')";
        mysqli_query($conLottery, $queryStr);
    }
}
/*Show data about a ticket */
function showTicket($alumno_id, $month_id)
{
    global $conLottery;
    global $conjpb;
    if (existTicket($alumno_id, $month_id)) {
        $queryLotStr = "   SELECT
                            ticket_id,
                            month_id
                        FROM
                            ticket
                        WHERE
                            alumno_id= $alumno_id
                            AND
                            month_id= $month_id";
        $queryLot = mysqli_query($conLottery, $queryLotStr);
        $rows = mysqli_fetch_assoc($queryLot);
        $resultLot = $rows;
        $queryStudentStr = "    SELECT alumno_id AS 'ID',
                            alumno_ap AS 'AP',
                            alumno_am AS 'AM',
                            alumno_nombres AS 'Nombres',
                            alumno_ndoc AS '# Documento',
                            grado.grado_descripcion AS 'Aula'
                            FROM alumno
                            JOIN aula_academica ON alumno.aa_id = aula_academica.aa_id
                            JOIN grado ON aula_academica.grado_id = grado.grado_id
                            WHERE alumno_id=$alumno_id";
        $queryStu = mysqli_query($conjpb, $queryStudentStr);
        $rows = mysqli_fetch_assoc($queryStu);
        $resultStudents = $rows;
        return array_merge($resultLot, $resultStudents);
    } else {
        return error_log("A parameter is null");
    }
}
/* Check if a ticket exist */
function existTicket($alumno_id, $month_id)
{
    global $conLottery;
    if ($alumno_id != null && $month_id != null) {
        $queryStr = "SELECT
                        ticket_id
                    FROM
                        ticket
                    WHERE
                        alumno_id= $alumno_id
                        AND
                        month_id= $month_id";
        $i = 0;
        $query = mysqli_query($conLottery, $queryStr);
        $result = array();
        while ($rows = mysqli_fetch_assoc($query)) {
            $result[$i] = $rows;
            break;
        }
        return !count($result) == 0;
    } else {
        return error_log("A parameter is null");
    }
}
/*Delete a Ticekt */
function deleteTicket($alumno_id, $month_id)
{
    global $conLottery;
    if (existTicket($alumno_id, $month_id)) {
        $queryStr = " DELETE FROM
                        ticket
                    WHERE
                        alumno_id='" . $alumno_id . "'
                        AND
                        month_id='" . $month_id . "'";
        $query = mysqli_query($conLottery, $queryStr);
    }else{
        return error_log("Ticket doesn't exist");
    }
}

/* Show month */
function showMonth($month_id)
{
    switch ($month_id) {
        case 10:
            return "Octubre";
        case 11:
            return "Noviembre";
        case 12:
            return "Diciembre";
        default:
            return "Mes no encontrado";
    }
}
