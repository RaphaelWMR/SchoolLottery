<?php
include("/xampp/htdocs/Sorteo/controller/ticketLogic.php");
?>
<?php
if (isset($_POST['showTicket'])) {
    $idAlumno = $_POST['alumnoid'];
    $idMonth = $_POST['monthid'];
    $dataTicket = array();
    $dataTicket = showTicket($idAlumno, $idMonth);
}
$ticket_id = addDigits($dataTicket['ticket_id'], 6);
$ticket_month = showMonth($dataTicket['month_id']);
$alumno_ap = $dataTicket['AP'];
$alumno_am = $dataTicket['AM'];
$alumno_n = $dataTicket['Nombres'];
$alumno_id = $dataTicket['# Documento'];
$alumno_aula = $dataTicket['Aula'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ticket.css">
    <title>Ticket</title>
</head>

<body>
    <div class="container border border-secondary rounded-3 border-3 mt-5">
        <div class="row">
            <div class="col-3 text-center border-end border-secondary border-2">
                <div class="img pt-2">
                    <img src="../img/cabecera.png" class="img-fluid" alt="">
                </div>
                <div class="img">
                    <img src="../img/qr_img.png" class="img-fluid" alt="">
                </div>
                <h2><b>TICKET N° <?php echo $ticket_id ?></b></h2>
                <p>Ticket del mes de <?php echo $ticket_month ?><br>Sorteo en vivo 2021<br>2 canastas navideñas<br>23 de diciembre<br>05:00 p.m.</p>
            </div>
            <div class="col-8">
                <h2>TICKET N°<?php echo $ticket_id ?></h2>
                <p>Ticket del mes de <?php echo $ticket_month ?></p>
                <hr class="new4">
                <p><b>Sorteo 2021</b><br><b>2 canastas navideñas</b></p>
                <p>IEP JEAN PIERRE BUCH</p>
                <hr class="new4">
                <p><?php echo $alumno_ap . " " . $alumno_am . "<br>" . $alumno_n ?></p>
                <p>AULA: <?php echo $alumno_aula ?></p>
                <hr class="new4">
                <div class=" d-flex flex-row mb-2">
                    <div class="img text-center ">
                        <img src="../img/cabecera.png" class="img-fluid " alt="">
                    </div>
                    <div class="img col-3">
                        <img src="../img/qr_img.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>