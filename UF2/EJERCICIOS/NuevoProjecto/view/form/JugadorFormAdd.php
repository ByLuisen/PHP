<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Jugador</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) {
                                                                        echo $content->getId();
                                                                    } ?>" />
            <label>Nombre *:</label>
            <input type="text" placeholder="Nombre" name="nombre" value="<?php if (isset($content)) {
                                                                                echo $content->getNombre();
                                                                            } ?>" />
            <label>Pais *:</label>
            <input type="text" placeholder="Pais" name="pais" value="<?php if (isset($content)) {
                                                                            echo $content->getPais();
                                                                        } ?>" />
            <label>Dorsal *:</label>
            <input type="text" placeholder="Dorsal" name="dorsal" value="<?php if (isset($content)) {
                                                                                echo $content->getDorsal();
                                                                            } ?>" />
            <label>Nacimiento *:</label>
            <input type="text" placeholder="Nacimiento" name="nacimiento" value="<?php if (isset($content)) {
                                                                                        echo $content->getNacimiento();
                                                                                    } ?>" />
            <label>Posicion *:</label>
            <input type="text" placeholder="Posicion" name="posicion" value="<?php if (isset($content)) {
                                                                                    echo $content->getPosicion();
                                                                                } ?>" />
            <label>Goles *:</label>
            <input type="text" placeholder="Goles" name="goles" value="<?php if (isset($content)) {
                                                                            echo $content->getGoles();
                                                                        } ?>" />
            <label>Partidos *:</label>
            <input type="text" placeholder="Partidos" name="partidos" value="<?php if (isset($content)) {
                                                                                    echo $content->getPartidos();
                                                                                } ?>" />
            <label>* Campos obligatorios</label>

            <input type="submit" name="action" value="add" />
            <input type="submit" name="reset" value="reset" />
        </fieldset>
    </form>
</div>