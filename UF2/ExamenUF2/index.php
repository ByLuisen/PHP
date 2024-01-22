<!--
Plantilla bàsica per a tota l'aplicació
-->
<?php
//obrim aquí la possibilitat de fer servir sessions ja que tot el que veurem estarà contingut a index.php
//no caldrà fer session_start a cap altre lloc/arxiu de la web!!!!
session_start();
//declarem una sèrie de constants
$host = $_SERVER['HTTP_HOST']; // localhost
//echo $host; 

$path = rtrim(dirname($_SERVER['PHP_SELF']), "/"); //carpeta del projecte
// echo "<br/>".$path;

$base = "http://" . $host . $path . "/";

//declarem rutes a partir d'aquestes constants i que farem servir al head i al body d'aquesta mateixa pàgina
define("PATH_CSS", $base . "view/css/");
define("PATH_IMG", $base . "view/img/");
define("PATH_JS", $base . "view/js/");
define("PATH_BOOTSTRAP_CSS", $base . "vendor/bootstrap-5.3.2-dist/css/");

//per poder fer la crida al controlador principal
require_once "controller/MainController.class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seleccion Futbol (MVC-POO)</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= PATH_BOOTSTRAP_CSS ?>bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= PATH_CSS ?>style.css">
    <script src="<?= PATH_JS ?>general-fn.js"></script>
</head>

<?php
//incloem el menú que ens interessa dels dos que tenim.
include('view/menu/MainMenu.html');
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    $controlMain = new MainController();
    //únic mètode del controlador principal que es pregunta per l'opció del menú
    $controlMain->processRequest();
    ?>

</body>

</html>