<div class="container">
    <legend class="mb-4">Añadir jugador</legend>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="id">Id *</label>
            <input type="text" class="form-control" id="id" placeholder="Id" name="id" value="<?php if (isset($content)) echo $content->getId(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="nombre">Nombre *</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if (isset($content)) echo $content->getNombre(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="pais">Pais *</label>
            <input type="text" class="form-control" id="pais" placeholder="Pais" name="pais" value="<?php if (isset($content)) echo $content->getPais(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="dorsal">Dorsal *</label>
            <input type="text" class="form-control" id="dorsal" placeholder="Dorsal" name="dorsal" value="<?php if (isset($content)) echo $content->getDorsal(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="nacimiento">Nacimiento *</label>
            <input type="date" class="form-control" id="nacimiento" placeholder="Nacimiento" name="nacimiento" value="<?php if (isset($content)) echo $content->getNacimiento(); ?>" min="<?php echo date('Y-m-d', strtotime('-50 years')); ?>" max="<?php echo date('Y-m-d') ?>">
        </div>
        <div class="form-group mb-3">
            <label for="posicion">Posicion *</label>
            <input type="text" class="form-control" id="posicion" placeholder="Posicion" name="posicion" value="<?php if (isset($content)) echo $content->getPosicion(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="goles">Goles *</label>
            <input type="text" class="form-control" id="goles" placeholder="Goles" name="goles" value="<?php if (isset($content)) echo $content->getGoles(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="partidos">Partidos *</label>
            <input type="text" class="form-control" id="partidos" placeholder="Partidos" name="partidos" value="<?php if (isset($content)) echo $content->getPartidos(); ?>">
        </div>
        <div class="form-group">
            <label class="custom-file-label" for="customFile">Seleccionar foto *</label>
            <input type="file" class="form-control" id="customFile" name="customFile" accept="view/img/">
        </div>
        <div class="mb-3">
            <small class="form-text text-muted">* Campos obligatorios</small>
        </div>
        <div>
            <button type="submit" class="btn btn-success" name="action" value="add">Agregar</button>
            <button type="submit" class="btn btn-secondary" name="reset" value="reset">Resetear</button>
        </div>
    </form>
</div>