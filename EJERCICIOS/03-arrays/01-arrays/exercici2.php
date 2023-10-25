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
        <<<<< Arrays asociativos>>>>>
    </h2>
    <hr>
    <?php
    printArrayByKey($arrayAsociative1);

    //Print myFooter
    myFooter();
    ?>

</body>

</html>