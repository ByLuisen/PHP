<div class="container">
    <ol>
        <?php
        foreach ($content as $entrenador) {
        ?>
            <li>
                <?php
                echo $entrenador->writingNewLine(); ?>
            </li>
        <?php
        }
        ?>
    </ol>
</div>