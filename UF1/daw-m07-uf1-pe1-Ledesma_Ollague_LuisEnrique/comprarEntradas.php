<?php
/**
 * Luis Enrique Ledesma Ollague
 * Fichero de formulario para comprar un partido
 */
session_name('LLigaBasquet');
session_start();
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('data/data.php');
myHead('Inicio de sesión');

myMenu();
contadorVisitas();
?>

<body>
<form action="">
    <ul>
        <li>
            <h2 >Selecciona el partido</h2>
            <select type="select" name="seleccionPartido[]" id="seleccionPartio" class="btn btn-light mx-4 ">
            <?php
                                        
                foreach ($partidos as $partido) {
                    $selected = selected($partido, $_SESSION['selected_partido'] ?? []);
                    echo "<option value=\"$partido\" $selected>$partido</option>";
                } ?>
            </select>
        </li>
        <!-- Correo-->
        <li>
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control border-2" maxlength="50" value="<?php echo $inputs['correo'] ?? '' ?>">
            <small><?php echo $errors['correo'] ?? ' ' ?></small>
        </li>
        <!-- Select de los meses -->
        <select name="mesVencimiento[]" id="fechaVencimiento" class="form-control border-2" style="width: 250px; background-color: #b5b5b5;" value="mesVencimiento[04]">
                                        <?php
                                        for ($i=1; $i < 6; $i++) { 
                                            $selected = selected($i, $_SESSION['selected_cantidad'] ?? []);
                                            echo "<option value=\"$i\" $selected>$i</option>";
                                        }?>
                                    </select>
        <li>
            <label for="telefono">Número de teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control border-2" maxlength="9" value="<?php echo $inputs['telefono'] ?? '' ?>" max="9">
            <small><?php echo $errors['telefono'] ?? ' ' ?></small>
        </li>
        <li>
            <button type="submit">Comprar</button>
        </li>
    </ul>
</form>
</body>