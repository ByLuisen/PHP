<?php
/**
 * Estructura de el header.
 * 
 * @param string $title Títluo que obtendrá es página.
 */
function myHead(string $title): void
{
    echo <<< HEAD
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- links to Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script> -->

    <!-- Bootstrap local links -->
    <link rel="stylesheet" href="./vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="./vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

    <!-- files CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <title>$title</title>
    </head>

    HEAD;
}