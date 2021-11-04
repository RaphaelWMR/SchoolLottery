<?php
include("/xampp/htdocs/Sorteo/controller/ticketLogic.php");
?>
<!DOCTYPE html>
<html lang="es">
<?php
if (isset($_POST['deleteTicket'])) {
    $idAlumno = $_POST['alumnoid'];
    $idMonth = $_POST['monthid'];
    $dataTicket = array();
    $dataTicket = showTicket($idAlumno, $idMonth);
}
$ticket_number = $dataTicket['ticket_id'];
$ticket_id = addDigits($ticket_number, 6);
$month_number = $dataTicket['month_id'];
$ticket_month = showMonth($month_number);
$alumno_iddb = $dataTicket['ID'];
$alumno_ap = $dataTicket['AP'];
$alumno_am = $dataTicket['AM'];
$alumno_n = $dataTicket['Nombres'];
$alumno_id = $dataTicket['# Documento'];
$alumno_aula = $dataTicket['Aula'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Eliminar Ticekt</title>
</head>

<body>
    <div class="d-flex flex-row justify-content-center alig-items-center">
        <div class="d-block">
            <div class="text-center bg-danger">
                <h2 class="text-light">Eliminar Ticket</h2>
            </div>
            <div class="text-center">
                <h3>¿Tiene la seguridad de eliminar el siguiente Ticekt?</h3>
            </div>
            <div class="container border border-secondary rounded-3 border-3">
                <div class="row">
                    <div class="col-2 text-center border-end border-secondary border-2">
                        <div class="img">
                            <img src="../img/cabecera.png" class="img-fluid" alt="">
                        </div>
                        <div class="img">
                            <img src="../img/qr_img.png" class="img-fluid" alt="">
                        </div>
                        <h2><b>TICKET N° <?php echo $ticket_id ?></b></h2>
                        <p> Mes de <?php echo $ticket_month ?><br>Sorteo en vivo 2021<br>23 de diciembre<br>05:00 p.m.</p>
                    </div>
                    <div class="col-4">
                        <h2>TICKET N°<?php echo $ticket_id ?></h2>
                        <p>Mes de <?php echo $ticket_month ?></p>
                        <hr class="new4">
                        <p>Sorteo 2021</p>
                        <p>IEP JEAN PIERRE BUCH</p>
                        <hr class="new4">
                        <p><?php echo $alumno_ap . " " . $alumno_am . "<br>" . $alumno_n ?></p>
                        <p>N° DE IDENTIFICACIÓN: <?php echo $alumno_id ?></p>
                        <p>AULA: <?php echo $alumno_aula ?></p>
                        <hr class="new4">
                        <div class=" d-flex flex-row">
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
            <div class="m-0 row justify-content-center">
                <div class="col-auto p-1 text-center d-flex justify-content-around">
                    <a class="btn btn-primary m-5" href="../tableTicket/tableticket.php">Cancelar</a>
                    <form action="/Sorteo/view/tableTicket/tableTicket.php" method="post">
                        <input type="hidden" name="alumnoid" value="<?php echo $alumno_iddb; ?>">
                        <input type="hidden" name="monthid" value="<?php echo $month_number; ?>">
                        <input type="submit" name="deleteTicket" class="btn btn-danger m-5" value="Eliminar Ticket">
                    </form>


                </div>
            </div>
        </div>
    </div>
</body>

</html>