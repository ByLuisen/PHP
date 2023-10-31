<?php

$filename = 'datosUsers.csv';
$data = [];

// open the file
$f = fopen($filename, 'r');

if ($f === false) {
    die('Cannot open the file ' . $filename);
}

// read each line in CSV file at a time
while (($row = fgetcsv($f)) !== false) {
    $data[] = $row;
}

// close the file
fclose($f);
?>

<pre>
<?php print_r($data); ?>
</pre>

<form action="guardarUser.php" method="post">
    <label for="user">User</label>
    <input type="text" name="user" id="user">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit">Guardar en CSV</button>
</form>