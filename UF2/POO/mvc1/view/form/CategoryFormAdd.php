<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>
                <?php echo ($_GET['option'] == 'form_modify') ? "Modify" : "Add" ?>
                category</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) {
                                                                        echo $content->getId();
                                                                    } ?>" style="<?php echo ($_GET['option'] == 'form_modify') ? "pointer-events: none;" : "" ?>" />
            <label>Name *:</label>
            <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) {
                                                                            echo $content->getName();
                                                                        } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="<?php echo ($_GET['option'] == 'form_modify') ? "modify" : "add" ?>" />
            <input type="submit" name="reset" value="reset" />
        </fieldset>
    </form>
</div>