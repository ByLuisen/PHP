<?php
session_start();
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('src/functions-login.php');
require('fpdf/fpdf.php');

if (isset($_SESSION['inputs'])) {
    $inputs = $_SESSION['inputs'];
    // Haz algo con $inputs, por ejemplo, mostrar los datos en el formulario
}
if (!isset($_SESSION['productos'])) {
    redirect_to('index.php');
    // Haz algo con $inputs, por ejemplo, mostrar los datos en el formulario
}
//calcular iva
$iva = $inputs['total'] * 0.21;
$precioTotal = $inputs['total'] + $iva;


if (isset($_POST['generate_pdf'])) {
    // Crear un objeto FPDF
    $pdf = new FPDF();

    // Configurar la codificación de caracteres
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTitle('Resumen del Pedido');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->AliasNbPages();
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    // Agregar contenido al PDF
    $pdf->Cell(0, 10, utf8_decode('Resumen pedido:'), 0, 1);
    $pdf->Ln(10); // Salto de línea

    $pdf->Cell(0, 10, utf8_decode('1 Dirección de envío'), 0, 1);
    $pdf->Cell(0, 10, utf8_decode($inputs['full-name']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode($inputs['direccion']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode($_SESSION['selected_ciudad'][0] . ", " . $_SESSION['selected_provincia'][0] . ", " . $inputs['codigo-postal']), 0, 1);

    $pdf->Ln(10); // Salto de línea

    $pdf->Cell(0, 10, utf8_decode('2 Método de Pago'), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Pagada con Visa / 4B / Euro6000 " . substr($inputs['numeroTarjeta'], -4)), 0, 1);

    $pdf->Ln(10); // Salto de línea

    $pdf->Cell(0, 10, utf8_decode('3 Productos'), 0, 1);
    foreach ($_SESSION['productos'] as $producto) {
        foreach ($producto as $key => $value) {
            $pdf->Cell(0, 10, utf8_decode($key . ": " . $value), 0, 1);
        }
        $pdf->Ln(5); // Salto de línea entre productos
    }

    $pdf->Ln(10); // Salto de línea

    // Calcular el IVA y el precio total
    $iva = $inputs['total'] * 0.21;
    $precioTotal = $inputs['total'] + $iva;

    $pdf->Cell(0, 10, utf8_decode("Productos: " . number_format($inputs['total'], 2) . " $"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Total sin IVA: " . number_format($inputs['total'], 2) . " $"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("IVA estimado: " . number_format($iva, 2) . " $"), 0, 1);
    $pdf->Cell(0, 10, utf8_decode("Total " . number_format($precioTotal, 2) . " $"), 0, 1);

    // Salida del PDF al navegador
    $pdf->Output('ticket_compra.pdf', 'D');
    exit;
}

myHead('Ticket de compra');
myMenu();
require_login();
?>

<body class="h-100">
    <div class="container-fluid">
        <!-- Form dirección de envío -->
        <div class="content vh-100">
            <div class="row pt-5 justify-content-center">
                <div class="col-xxl-5 p-4" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                    <h1>Resumen pedido</h1>
                    <div class="d-flex mt-4">
                        <div>
                            <div class="mb-4">
                                <h4>1 Dirección de envío</h4>
                                <div>
                                    <ul>
                                        <li><?php echo $inputs['full-name']; ?></li>
                                        <li><?php echo $inputs['direccion']; ?></li>
                                        <li><?php echo $_SESSION['selected_ciudad'][0] . ", " . $_SESSION['selected_provincia'][0] . ", " . $inputs['codigo-postal']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h4>2 Metódo de Pago</h4>
                                <div>
                                    <ul>
                                        <li><?php echo "Pagada con Visa / 4B / Euro6000 " . substr($inputs['numeroTarjeta'], -4) ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <h4>3 Productos</h4>
                                <div>
                                    <?php foreach ($_SESSION['productos'] as $producto) {
                                        foreach ($producto as $key => $value) {
                                            echo $key . ": " . $value;
                                            echo "<br>";
                                        }
                                        echo "<br>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <h4>Resumen del pedido</h4>
                            <div>
                                <ul>
                                    <li><?php echo "Productos: " . number_format($inputs['total'], 2) . " €" ?></li>
                                    <li><?php echo "Total sin IVA: " . number_format($inputs['total'], 2) . " €" ?></li>
                                    <li><?php echo "IVA estimado: " . number_format($iva, 2) . " €" ?></li>
                                    <li><b><?php echo "Total " . number_format($precioTotal, 2) . " €" ?></b></li>
                                </ul>
                            </div>
                            <form method="post">
                                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="generate_pdf">Descargar Ticket PDF</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php
myFooter();
?>