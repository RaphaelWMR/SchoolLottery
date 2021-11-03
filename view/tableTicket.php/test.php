<?php
include("/xampp/htdocs/Sorteo/controller/tableLogic.php");
?>
<!DOCTYPE html>
<html lang="en">

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
        <thead>
            <tr>
                <?php foreach ($array[0] as $item => $value) { ?>
                    <th> <?php echo $item ?></th>
                <?php } ?>
                <th>Octubre</th>
                <th>Noviembre</th>
                <th>Diciembre</th>
            </tr>
            <td>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($array); $i++) { ?>
                <tr>
                    <?php foreach ($array[$i] as $item => $value) {
                    ?>
                        <td> <?php echo $value ?></td>
                    <?php } ?>
                    <?php for ($j = 0; $j < 3; $j++) { ?>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <a class="btn btn-success" href="">Agregar Ticket</a>
                            </form>

                            <a class="btn btn-primary display-block" href="">Ver ticket</a>
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