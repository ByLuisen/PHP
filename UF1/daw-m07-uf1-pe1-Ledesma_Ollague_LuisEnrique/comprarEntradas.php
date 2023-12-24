<?php

/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Fichero de formulario para comprar la entrada de un partido
 */
session_name('LLigaBasquet');
session_start();
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('data/data.php');
myHead('Comprar entradas');

myMenu();
// Mostrar el número de visitas
contadorVisitas();

// Almacenar la variable session 'inputs' en la variable $inputs.
if (isset($_SESSION['inputs'])) {
    $inputs = $_SESSION['inputs'];
}
// Almacenar la variable session 'errors' en la variable $errors.
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="src/validationComprarEntradas.php" method="post">
                    <ul class="list-unstyled">
                        <!-------------------------------- Partidos -------------------------------->
                        <li class="my-4">
                            <h2 class="text-center mb-3">Selecciona un partido</h2>
                            <select type="select" name="seleccionPartido[]" id="seleccionPartio" class="btn btn-light">
                                <?php
                                foreach ($partidos as $partido) {
                                    $selected = selected($partido, $_SESSION['selected_partido'] ?? []);
                                    echo "<option value=\"$partido\" $selected>$partido</option>";
                                } ?>
                            </select>
                        </li>

                        <!-------------------------------- Zonas -------------------------------->
                        <li>
                            <h3>Elige una zona</h3>
                        </li>
                        <?php foreach ($zonas as $zona => $precio) : ?>
                            <li class="d-flex justify-content-between">
                                <label for="zona<?php echo $zona ?>"><?php echo $zona ?></label>
                                <div class="d-flex align-items-center">
                                    <input type="radio" name="zonas" id="zona_<?php echo $zona ?>" value="<?php echo $zona ?>" <?php echo checked($zona, $_SESSION['selected_zona'] ?? []) ?> />
                                    <span class="ms-2"><?php echo $precio  . ' €' ?></span>
                                </div>
                            </li>
                        <?php endforeach ?>
                        <li>
                            <small class="text-danger"><?php echo $errors['zona'] ?? '' ?></small>
                        </li>

                        <!-------------------------------- Correo -------------------------------->
                        <li class="my-3">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control border-2" maxlength="50" value="<?php echo $inputs['correo'] ?? '' ?>">
                            <small class="text-danger"><?php echo $errors['correo'] ?? ' ' ?></small>
                        </li>

                        <!------------------------ Select número de entradas ------------------------>
                        <li>
                            <label>Número de entradas</label>
                            <select type="select" name="seleccionEntradas[]" id="seleccionEntradas" class="btn btn-light mx-4 ">
                                <?php
                                for ($i = 1; $i < 6; $i++) {
                                    $selected = selected($i, $_SESSION['selected_entradas'] ?? []);
                                    echo "<option value=\"$i\" $selected>$i</option>";
                                } ?>
                            </select>
                        </li>

                        <!-------------------------------- Telefono -------------------------------->
                        <li class="my-3">
                            <label for="telefono">Número de teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control border-2" maxlength="9" value="<?php echo $inputs['telefono'] ?? '' ?>" max="9">
                            <small class="text-danger"><?php echo $errors['telefono'] ?? ' ' ?></small>
                        </li>

                        <!-------------------------------- Botón de comprar -------------------------------->
                        <li class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Comprar</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
// Eliminar variables session en específico.
eliminarVariablesSession();
?>