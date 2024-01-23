<div class="container">
    <legend class="mb-4">Añadir Libro</legend>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="isbn">Isbn *</label>
            <input type="text" class="form-control" id="isbn" placeholder="20202020001" name="isbn" value="<?php if (isset($content)) echo $content->getIsbn(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="titulo">Titulo *</label>
            <input type="text" class="form-control" id="titulo" placeholder="title1" name="titulo" value="<?php if (isset($content)) echo $content->getTitle(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="descripcion">Descripcion *</label>
            <input type="text" class="form-control" id="descripcion" placeholder="description1" name="descripcion" value="<?php if (isset($content)) echo $content->getDescripcion(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="autor">Autor *</label>
            <input type="text" class="form-control" id="autor" placeholder="author1" name="autor" value="<?php if (isset($content)) echo $content->getAutor(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="publicacion">Fecha de publicacion *</label>
            <input type="text" class="form-control" id="publicacion" placeholder="2017-12-03" name="publicacion" value="<?php if (isset($content)) echo $content->getPublicationDate(); ?>">
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