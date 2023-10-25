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
    <?php
    printArrayByPHPFunctions($arrayAsociative1);

    //Print myFooter
    myFooter();
    ?>

</body>

</html>