<?php
//Iniciar la sessión
session_start();

//Declarar variables de session
$_SESSION["favcolor"] = "negro";
$_SESSION["favanimal"] = "conejo";

//Devuelve el número de visitas de la página Home
function getVisitasHome()
{
    return isset($_SESSION["visitasHome"]) ? $_SESSION["visitasHome"] : 0;
}

/* Si la variable de visitasHome no está declarada la inicializa a 1 y 
sí si esta creada la incrementa 1
 */
function incrementarVisitasHome()
{
    if (!isset($_SESSION["visitasHome"])) {
        $_SESSION["visitasHome"] = 1;
    } else {
        $_SESSION["visitasHome"]++;
    }
}

//Devuelve el número de visitas de la página Ejercicio 1
function getVisitasEj1()
{
    return isset($_SESSION["visitasEj1"]) ? $_SESSION["visitasEj1"] : 0;
}

/* Si la variable de visitasEj1 no está declarada la inicializa a 1 y 
sí si esta creada la incrementa 1
 */
function incrementarVisitasEj1()
{
    if (!isset($_SESSION["visitasEj1"])) {
        $_SESSION["visitasEj1"] = 1;
    } else {
        $_SESSION["visitasEj1"]++;
    }
}

//Devuelve el número de visitas de la página Ejercicio 2
function getVisitasEj2()
{
    return isset($_SESSION["visitasEj2"]) ? $_SESSION["visitasEj2"] : 0;
}

/* Si la variable de visitasEj2 no está declarada la inicializa a 1 y 
sí si esta creada la incrementa 1
 */
function incrementarVisitasEj2()
{
    if (!isset($_SESSION["visitasEj2"])) {
        $_SESSION["visitasEj2"] = 1;
    } else {
        $_SESSION["visitasEj2"]++;
    }
}

//Devuelve el número de visitas de la página Ejercicio 3
function getVisitasEj3()
{
    return isset($_SESSION["visitasEj3"]) ? $_SESSION["visitasEj3"] : 0;
}

/* Si la variable de visitasEj3 no está declarada la inicializa a 1 y 
sí si esta creada la incrementa 1
 */
function incrementarVisitasEj3()
{
    if (!isset($_SESSION["visitasEj3"])) {
        $_SESSION["visitasEj3"] = 1;
    } else {
        $_SESSION["visitasEj3"]++;
    }
}
