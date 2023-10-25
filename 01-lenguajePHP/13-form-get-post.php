<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Get $ Post</title>
</head>

<body>
    <?php
    if ($_POST) {
        echo "El formulario se envió con éxito <br>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
    ?>
    <form action="" method="post">
        <p>
            Dime tu nombre: <input type="text" name="nombre">
        </p>
        <p>
            Dime tu ciudad: <input type="text" name="ciudad">
        </p>
        <p>
            ¿En que año naciste?:
            <select name="anyoNacimiento">
                <option value="null">Selecciona un año</option>
                <?php
                $anyos = 1900;
                while ($anyos < 2023) {
                ?>
                    <option value="<?= $anyos; ?>"><?= $anyos; ?></option>
                <?php
                    $anyos++;
                }
                ?>
            </select>
        </p>

        <p>
            <input type="submit" value="Validar">
        </p>
    </form>
</body>

</html>