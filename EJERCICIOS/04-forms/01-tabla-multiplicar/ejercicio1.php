<?php
require_once('functions-structure.php');
myHead();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    myMenu();
    ?>
    <div class="container">
        <h2>Test1: Practicamos variables, estructuras de control, pequeños formularios y recogida de valores</h2>
        <form action="" method="get">
            <p>
                Dona'm un numero entre 1 i 20 <input type="text" name="numero" placeholder="NUMERO">
            </p>
            <?php
            if (isset($_GET['numero'])) {
                if ($_GET['numero'] < 1 || $_GET['numero'] > 20) {
                    echo "<p>Numero introducido incorrecto</p>";
                } else {
                    $numeroIntroducido = $_GET['numero'];
            ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope='col'>X</th>
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    echo "<th scope='col'>{$i}</th>";
                                };
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($numero = 1; $numero <= $numeroIntroducido; $numero++) {
                                echo "<tr>";
                                echo "<th scope='row'>{$numero}</th>";
                                for ($i = 1; $i <= 10; $i++) {
                                    echo "<td>" . $numero * $i . "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
            <?php
                }
            }
            ?>
            <p>
                <input type="submit" value="Calcular">
            </p>
        </form>
    </div>
    <?php
    myFooter();
    ?>
</body>

</html>