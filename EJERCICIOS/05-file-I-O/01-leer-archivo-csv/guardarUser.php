<?php

$data = [
    [$_POST['user'],$_POST['password']]
];

$filename = 'datosUsers.csv';

$f = fopen($filename, 'a');

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// write each row at a time to a file
foreach ($data as $row) {
	fputcsv($f, $row);
}

// close the file
fclose($f);

header('Location: leer_fichero_csv.php');

