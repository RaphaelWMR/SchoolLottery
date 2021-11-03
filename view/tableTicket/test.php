<?php
include("/xampp/htdocs/Sorteo/controller/tableLogic.php");
include("/xampp/htdocs/Sorteo/controller/ticketLogic.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_POST['addTicket'])) {
    $is_alumno_id = $_POST['alumnoid'];
    $is_month_id = $_POST['monthid'];
    newTicket($is_alumno_id, $is_month_id);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h1>Tickets para el sorteo de navidad</h1>
    <table class="table table-striped">
        <?php
        $array = getStudents();
        ?>
        <thead class="thead-dark">
            <tr>
                <?php foreach ($array[0] as $item => $value) { ?>
                    <th scope="col"> <?php echo $item ?></th>
                <?php } ?>
                <th scope="col">Octubre</th>
                <th scope="col">Noviembre</th>
                <th scope="col">Diciembre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($array); $i++) { ?>
                <tr>
                    <?php foreach ($array[$i] as $item => $value) {
                        if ($item == "ID") {
                            $alumno_id = $value;
                        } ?>
                        <td> <?php echo $value ?></td>
                    <?php } ?>
                    <?php for ($j = 0; $j < 3; $j++) { ?>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <input type="hidden" name="alumnoid" value="<?php echo $alumno_id; ?>">
                                <input type="hidden" name="monthid" value="<?php echo $j + 10; ?>">
                                <input type="submit" name="addTicket" class="btn btn-success" value="Agregar Ticket">
                            </form>

                            <a class="btn btn-primary" href="">Ver ticket</a>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <a class="btn btn-danger" href="">Quitar Ticket</a>
                            </form>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>