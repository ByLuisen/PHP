<div class="container">
    <div class="row mb-5">
        <fieldset>
            <legend class="text-center mb-3">JUGADORES LIST</legend>
            <?php
            if (isset($content)) {
                echo <<<EOT
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Pais</th>
                                <th scope="col">Dorsal</th>
                                <th scope="col">Nacimiento</th>
                                <th scope="col">Posicion</th>
                                <th scope="col">Goles</th>
                                <th scope="col">Partidos</th>
                            </tr>
                        </thead>
                        <tbody>
EOT;
                foreach ($content as $category) {
                    echo <<<EOT
                        <tr> 
                            <th scope="row">{$category->getId()}</th>
                            <td>{$category->getNombre()}</td>
                            <td>{$category->getPais()}</td>
                            <td>{$category->getDorsal()}</td>
                            <td>{$category->getNacimiento()}</td>
                            <td>{$category->getPosicion()}</td>
                            <td>{$category->getGoles()}</td>
                            <td>{$category->getPartidos()}</td>
                        </tr>
EOT;
                }
                echo <<<EOT
                        </tbody>
                    </table>
EOT;
            }
            ?>
        </fieldset>
    </div>
</div>