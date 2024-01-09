<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Add product</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" />
            <label>Marca *:</label>
            <input type="text" placeholder="Marca" name="marca" value="<?php if (isset($content)) { echo $content->getMarca(); } ?>" />
            <label>Name *:</label>
            <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) { echo $content->getName(); } ?>" />
            <label>Descripcion *:</label>
            <input type="text" placeholder="Descripcion" name="descripcion" value="<?php if (isset($content)) { echo $content->getDescripcion(); } ?>" />
            <label>Precio *:</label>
            <input type="text" placeholder="Precio" name="precio" value="<?php if (isset($content)) { echo $content->getPrecio(); } ?>" />
            <label>Stock *:</label>
            <input type="text" placeholder="Stock" name="stock" value="<?php if (isset($content)) { echo $content->getStock(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="add" />
            <input type="submit" name="reset" value="reset"  />
        </fieldset>
    </form>
</div>