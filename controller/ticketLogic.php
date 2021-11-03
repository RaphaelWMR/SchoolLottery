<?php
include("/xampp/htdocs/Sorteo/controller/tableLogic.php");

/** Add Digits */
function addDigits($number, $digits, $character="0")
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
                        alumno_id='" . $alumno_id . "'
                        AND
                        month_id='" . $month_id . "'";
        $query = mysqli_query($conLottery, $queryStr);
        if (is_null($query)) {
            return false;
        } else {
            return true;
        }
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
    }
}
