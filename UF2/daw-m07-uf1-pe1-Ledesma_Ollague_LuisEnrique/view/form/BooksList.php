<div class="container">
    <div class="row mb-5">
        <fieldset>
            <legend class="text-center mb-3">Llistat de books</legend>
            <?php
            if (isset($content)) {
                echo <<<EOT
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Isbn</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Publication Date</th>
                    EOT;
                if ($_SESSION['rol'] == 'admin') {
                    echo <<<EOT
                        <th scope="col"><a href="home.php?option=add_book"><button class="btn btn-success">Add a book</button></a></th>
                    EOT;
                }
                echo <<<EOT
                                
                            </tr>
                        </thead>
                        <tbody>
EOT;
                foreach ($content as $books) {
                    echo <<<EOT
                        <tr> 
                            <th scope="row">{$books->getIsbn()}</th>
                            <td>{$books->getTitle()}</td>
                            <td>{$books->getDescripcion()}</td>
                            <td>{$books->getAutor()}</td>
                            <td>{$books->getPublicationDate()}</td>
                    EOT;
                    
                    if ($_SESSION['rol'] == 'admin') {
                        echo <<<EOT
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <a href="home.php?option=delete&isbn={$books->getIsbn()}"><button class="btn btn-danger" name="action" value="delete">Delete</button></a>
                        </td>                    
                        EOT;
                    }

                    echo <<<EOT
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