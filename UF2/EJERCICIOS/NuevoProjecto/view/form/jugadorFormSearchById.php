<div id="content" class="container mt-5">
    <div class="row">
        <div class="col-3">
            <form method="post" action="">
                <fieldset>
                    <div class="form-group mb-3">
                        <legend>
                            <?php echo ($_GET['option'] == 'borrar_jugador') ? "Eliminar" : "Buscar" ?> por Id
                        </legend>
                    </div>

                    <div class="form-group mb-3">
                        <label for="id">Id *</label>
                        <input type="text" class="form-control" id="id" placeholder="Id" name="id" value="<?php if (isset($content)) echo $content->getId(); ?>" />
                        <small class="form-text text-muted mb-3">* Campos requeridos</small>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success" name="action" value="<?php echo ($_GET['option'] == 'borrar_jugador') ? "borrar" : "buscar" ?>">
                            <?php echo ($_GET['option'] == 'borrar_jugador') ? "Eliminar" : "Buscar" ?>
                        </button>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
</div>