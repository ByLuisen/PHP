<div class="container">
    <div class="row mb-5">
        <fieldset>
            <div class="d-flex">
            <?php

                foreach ($content as $category) {
                    if ($category->getNameCategory() != 'Books') {
                        echo <<<EOT
                        <div
                            <tr> 
                                <a href="home.php?option=category"><img src="view/books/{$category->getId()}.jpg" alt="{$category->getId()}"></a>
                                <p>{$category->getNameCategory()}</p>
    
                            </tr>
                        </div>
    EOT;      
                    } else {
                        echo <<<EOT
                        <div
                            <tr> 
                            <a href="home.php?option=list_books"><img src="view/books/{$category->getId()}.jpg" alt="{$category->getId()}"></a>
                            <p>{$category->getNameCategory()}</p>
    
                            </tr>
                        </div>
    EOT;      
                    }
          
                }
            
            ?>
            </div>
        </fieldset>
    </div>
</div>