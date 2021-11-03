<?php
include("/xampp/htdocs/Sorteo/controller/ticketLogic.php");
?>
<?php
if (isset($_POST['showTicket'])) {
    $idAlumno = $_POST['alumnoid'];
    $idMonth = $_POST['monthid'];
    echo "A".$idAlumno . " " . $idMonth;
    $dataTicket = array();
    $dataTicket = showTicket($idAlumno, $idMonth);
    echo print_r($dataTicket);
}
/*$idAlumno = $_GET['idA'];
$idMonth = $_GET['idM'];*//*
$dataTicket = array();
$dataTicket = showTicket($idAlumno, $idMonth);
echo print_r($dataTicket);*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ticket</title>
</head>

<body>
    <h1>Ticket #<?php echo addDigits($dataTicket['ticket_id'], 6) ?></h1>
    <p><?php echo showMonth($dataTicket['month_id']) ?></p>
    <p><?php echo $dataTicket['AP'] ?></p>
    <p><?php echo $dataTicket['AM'] ?></p>
    <p><?php echo $dataTicket['Nombres'] ?></p>
    <p><?php echo $dataTicket['# Documento'] ?></p>
    <p><?php echo $dataTicket['Aula'] ?></p>
</body>

</html>