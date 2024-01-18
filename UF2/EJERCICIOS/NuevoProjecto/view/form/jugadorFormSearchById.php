<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>
                <?php echo ($_GET['option'] == 'borrar_jugador') ? "Eliminar" : "Buscar" ?>
                por Id
            </legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) {
                                                                        echo $content->getId();
                                                                    } ?>" />

            <label>* Campos requeridos</label>

            <input type="submit" name="action" value="<?php echo ($_GET['option'] == 'borrar_jugador') ? "borrar" : "buscar" ?>" />
        </fieldset>
    </form>
</div>