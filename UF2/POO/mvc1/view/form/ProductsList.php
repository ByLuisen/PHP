<div id="content">
    <fieldset>
        <legend>Products list</legend>    
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Marca</th>
                            <th>Name</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                        </tr>
EOT;
                foreach ($content as $product) {
                    echo <<<EOT
                        <tr>
                            <td>{$product->getId()}</td>
                            <td>{$product->getMarca()}</td>
                            <td>{$product->getName()}</td>
                            <td>{$product->getDescripcion()}</td>
                            <td>{$product->getPrecio()}</td>
                            <td>{$product->getStock()}</td>
                        </tr>
EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
        ?>
    </fieldset>
</div>
