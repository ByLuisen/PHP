<?php

declare(strict_types=1);

//Types casts 
//------------

//Function convert to int
//---------------------------------------------------
function convert_to_int($input): void
{
    var_dump($input);
    echo "<br>";
    var_dump($input + 3);
    //casting
    var_dump((int)$input);
}





//Main function
//---------------------------------------------------
function main(): void
{
    convert_to_int("456");
}

//Web code testing
//---------------------------------------------------
main();
