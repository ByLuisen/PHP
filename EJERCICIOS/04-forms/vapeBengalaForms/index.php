<?php
require __DIR__ . '/inc/validation.php';
require_once('./inc/functions-structure.php');
myHead();
myMenu();

?>
<div class="container-fluid">
    <!-- Form dirección de envío -->
    <div class="content">
        <form method="post">
            <div class="row pt-5 justify-content-center">
                <div class="col-xxl-5 p-4" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                    <ul>
                        <li class="mb-4">
                            <h2 class="text-white">Dirección de envío</h2>
                        </li>
                        <li>
                            <label class="text-white" for="full-name">Nombre completo (nombre y apellidos)</label>
                            <input type="text" name="full-name" id="full-name" class="form-control border-2">
                            <small><?php echo $errors['full-name']??' ' ?></small>
                        </li>
                        <li>
                            <label class="text-white" for="telefono">Número de teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control border-2">
                            <small><?php echo $errors['telefono'] ?? ' ' ?></small>
                        </li>
                        <li>
                            <label class="text-white" for="correo">Correo</label>
                            <input type="text" name="correo" id="correo" class="form-control border-2">
                            <small><?php echo $errors['correo'] ?? ' ' ?></small>
                        </li>
                        <li>
                            <label class="text-white" for="direccion">Línea de dirección 1</label>
                            <input type="text" name="direccion" id="direccion" class="form-control border-2">
                            <small><?php echo $errors['direccion'] ?? ' ' ?></small>
                        </li>
                        <li>
                            <div class="d-flex">
                                <div class="me-5">
                                    <label class="text-white" for="codigo-postal">Código postal</label>
                                    <input type="text" name="codigo-postal" id="codigo-postal" class="form-control border-2">
                                    <small><?php echo $errors['codigo-postal'] ?? ' ' ?></small>
                                </div>
                                <div class="w-100">
                                    <label class="text-white" for="ciudad">Ciudad</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control border-2">
                                    <small><?php echo $errors['ciudad'] ?? ' ' ?></small>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label class="text-white" for="provincia">Provincia</label>
                            <input type="text" name="provincia" id="provincia" class="form-control border-2">
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Form método de pago -->
            <div class="row p-5 justify-content-center">
                <div class="col-xxl-5 p-4" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                    <ul>
                        <li class="mb-3">
                            <h2 class="text-white">Método de pago</h2>
                        </li>
                        <li class="d-flex align-items-center p-1">
                            <label for="numeroTarjeta" class="text-white pr-2 w-25">Número de la tarjeta</label>
                            <input type="text" name="numeroTarjeta" id="numeroTarjeta" class="form-control border-2" style="width: 500px;">
                            <small class=""><?php echo $errors['numeroTarjeta'] ?? '' ?></small>
                        </li>
                        <li class="d-flex align-items-center p-1">
                            <label for="nombreTarjeta" class="text-white pr-2 w-25">Nombre en la tarjeta</label>
                            <input type="text" name="nombreTarjeta" id="nombreTarjeta" class="form-control border-2" style="width: 500px;">
                            <small><?php echo $errors['nombreTarjeta'] ?? '' ?></small>
                        </li>
                        <li class="d-flex align-items-center p-1">
                            <label for="fechaVencimiento" class="text-white pr-2 w-25">Fecha vencimiento</label>
                            <input type="number" name="mesVencimiento" id="fechaVencimiento" min="1" max="12" class="form-control border-2" style="width: 250px;" placeholder="1-12">
                            <small><?php echo $errors['mesVencimiento'] ?? '' ?></small>
                            <input type="number" name="anyoVencimiento" id="fechaVencimiento" min="2023" class="form-control border-2" style="width: 250px;" placeholder="2023">
                            <small><?php echo $errors['anyoVencimiento'] ?? '' ?></small>
                        </li>
                        <li class="d-flex align-items-center p-1">
                            <label for="codigoSeguridadTarjeta" class="text-white pr-2 w-25">Codigo de seguridad (CVV)</label>
                            <input type="number" name="codigoSeguridadTarjeta" id="codigoSeguridadTarjeta" class="form-control border-2" id="codigoSeguridadTarjeta" style="width: 500px;" placeholder="XXX">
                            <small><?php echo $errors['codigoSeguirdadTarjeta'] ?? '' ?></small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Ofertars Personalizadas -->
            <div class="row justify-content-center mb-5">
                <div class="col-xxl-7 p-5" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                    <ul>
                        <li>
                            <div class="form-floating mb-3">
                                <h2 style="color: white;">Ofertas del día</h2></br>
                                <div class="d-flex justify-content-between mx-2 text-center px-5">
                                    <div>
                                        <img src="./img/oferta1.jpg" width="180px" height="180px" style="border-radius: 30px;" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento1" class="me-3">
                                            <label for="complemento1" style="color: white;">Vaper Recargable (6,50€)</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./img/oferta2.jpg" width="180px" height="180px" style="border-radius: 30px;" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento2" class="me-3">
                                            <label for="complemento2" style="color: white;">Vaper de Mango (8,35€)</label>
                                        </div>
                                    </div>
                                    <div style="width:190px">
                                        <img src="./img/oferta3.jpg" width="180px" height="180px" style="border-radius: 30px;" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento3" class="me-3">
                                            <label for="complemento3" style="color: white">Vaper Fresa (10,95€)</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./img/oferta4.jpg" width="180px" height="180px" style="border-radius: 30px;" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento4" class="me-3">
                                            <label for="complemento4" style="color: white;">Vaper Piña (9,80€)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Form vaper personalizado-->
            <div class="row justify-content-center">
                <div class="col-xxl-7 p-5" style="background:linear-gradient(180deg, #D65573 -0.35%, #DC1040 -0.34%, #F59448 99.65%); border-radius: 23px;">
                    <ul>
                        <li>
                            <div class="form-floating mb-5 d-flex align-items-center">
                                <input class="me-3" type="checkbox" name="vaper" width="100px">
                                <h2 style="color: white;">Vaper personalizado</h2>
                            </div>
                        </li>
                        <li>
                            <div class="form-floating mb-3">
                                <h2 style="color: white;">Cantidad<input type="number" name="vaper" min="1" max="10" value="1" place class="mx-4"></h2><br>
                            </div>
                        </li>
                        <li>
                            <div class="form-floating mb-3">
                                <h2 class="text-white">Tamaños</h2>
                                <div class="d-flex justify-content-between my-5 px-5">
                                    <div>
                                        <img src="./img/vaper1.png" width="260px" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="radio" name="tamaños[]" id="tamaño" class="me-3">
                                            <label for="tamaño" style="color: white;">Pequeño (9,95€)</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./img/vaper2.png" width="260px" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="radio" name="tamaños[]" id="tamaño" class="me-3">
                                            <label for="tamaño" style="color: white;">Mediano (11,95€)</label>
                                        </div>

                                    </div>
                                    <div>
                                        <img src="./img/vaper3.png" width="260px" class="mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="radio" name="tamaños[]" id="tamaño" class="me-3">
                                            <label for="tamaño" style="color: white;">Grande (14,95€)</label>
                                        </div>

                                    </div>
                                </div>
                        </li>
                        <li>
                            <div class="form-floating mb-5">
                                <h2 style="color: white;">Sabores del vaper<select type="select" name="seleccionVaper" id="seleccionVaper" class="btn btn-light mx-4 ">
                                        <option value="value1">Peach Ice (Melocotón Helado)</option>
                                        <option value="value2">Yogurt</option>
                                        <option value="value3">Skittles(Caramelo de Frutas)</option>
                                        <option value="value4">Grape Ice(Uva Helada)</option>
                                        <option value="value5">Mixed Fruit(Mix de Frutas)</option>
                                        <option value="value6">Peach Mango Watermelon(Melocotón Mango Sandía)</option>
                                        <option value="value7">Strawberry Ice Cream(Helado de Fresa)</option>
                                    </select>
                                </h2>
                            </div>
                        </li>
                        <li>
                            <div class="form-floating mb-3">
                                <h2 style="color: white;">Complementos</h2></br>
                                <div class="d-flex justify-content-between mx-2 text-center px-5">
                                    <div>
                                        <img src="./img/pod1.png" width="180px">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento1" class="me-3">
                                            <label for="complemento1" style="color: white;">Pod de Fresa (2,95€)</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./img/pod2.png" width="180px">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento2" class="me-3">
                                            <label for="complemento2" style="color: white;">Pod de Sandía (3,95€)</label>
                                        </div>
                                    </div>
                                    <div style="width:190px">
                                        <img src="./img/pod3.png" width="180px">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento3" class="me-3">
                                            <label for="complemento3" style="color: white">Pod algodón de azucar (4,95€)</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./img/pod4.png" width="180px">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="checkbox" name="complemento[]" id="complemento4" class="me-3">
                                            <label for="complemento4" style="color: white;">Pod de Mora (5,95€)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center py-5">
                <button type="submit" name="submit" class="btn rounded-pill p-3 text-white">
                    <h5>Comprar ahora</h5>
                </button>
            </div>
        </form>
    </div>
</div>
<?php
myFooter();
?>