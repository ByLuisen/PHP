<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>
                <?php echo ($_GET['option'] == 'form_delete') ? "Delete" : "Search" ?>
                <?php echo ($_GET['menu'] == 'category') ? "category" : "product" ?>
                by Id</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) {
                                                                        echo $content->getId();
                                                                    } ?>" />

            <label>* Required fields</label>

            <input type="submit" name="action" value="<?php echo ($_GET['option'] == 'form_delete') ? "delete" : "search" ?>" />
            <input type="submit" name="reset" value="reset" />
        </fieldset>
    </form>
</div>