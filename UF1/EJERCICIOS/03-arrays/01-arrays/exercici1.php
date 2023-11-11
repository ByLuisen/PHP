<?php
require_once 'functions-arrays.php';
require_once 'functions-structure.php';
// Print HTML my HEADER
myHeader();
?>

<body>
    <?php 
    // Print HTML my NAVBAR
    myMenu(); ?>

    <!-- WEB Code-->
    <h2>
        <<<<< Arrays indexados>>>>>
    </h2>
    <?php printArrayByIndex($arrayIndexado); ?>

    <br><br>

    <?php
    //Print myFooter
    myFooter();
    ?>

</body>

</html>