<div class="container mt-5">
    <div class="text-center">
        <div class="text-primary d-flex justify-content-center">
            <?php
            if (is_array($_SESSION['info']) == TRUE) {
                foreach ($_SESSION['info'] as $info) {
                    echo  "<div class='alert alert-success' role='alert'>";
                    echo "<p class='mx-2'>$info</p>";
                    echo "</div>";
                }
            } else {
                echo  "<div class='alert alert-success' role='alert'>";
                echo "<p class='mx-2'>{$_SESSION['info']}</p>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="text-danger d-flex justify-content-center">
            <?php
            if (is_array($_SESSION['error']) == TRUE) {
                foreach ($_SESSION['error'] as $error) {
                   echo  "<div class='alert alert-danger' role='alert'>";
                   echo "<p class='mx-2'>$error</p>";
                   echo "</div>";
                }
            } else {
                echo  "<div class='alert alert-danger' role='alert'>";
                echo "<p class='mx-2'>{$_SESSION['error']}</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>