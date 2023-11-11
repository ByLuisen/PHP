<?php

declare(strict_types=1);
//PHP is an implicitly typed language.
//But you can explicit types in function declarations

//Print Line. Appends an EOL at the end 
//-----------------------------------------------------
function println($something)
{
    echo $something;
    echo "<br>";
}


//Add 2 integers
//----------------------------------------------------------
function sum_ints(int $num1, int $num2): int
{
    $result = $num1 + $num2;
    return $result;
}

//TO DO: Add 2 float
//----------------------------------------------------------
function sum_floats(float $num1, float $num2): float
{
    $result = $num1 + $num2;
    return $result;
}

//TO DO: Add_newline: string + return 
//----------------------------------------------------------
function addNewline(string $something): string
{
    $result = $something . "<br>";
    return $result;
}

//Main function
//----------------------------------------------------------
function main(): void
{

    //Local vars
    $num = sum_ints(3, 4); //int
    $floats = sum_floats(2.34, 3.54); // float
    $text_sum_floats = addNewline("Sumar floats:"); //string
    //Print 
    println("Variables:");
    println($num);
    println("var_dump:");
    println(var_dump($num));
    echo $text_sum_floats;
    println($floats);
}

//Web code
main();
