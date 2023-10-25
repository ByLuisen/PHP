<?php

declare(strict_types=1);

//Strings 
//------------

//ejemplo 1
//---------------------------------------------------

$he = 'Bob';
$she = 'Alice';

$text = <<<TEXT
$he said "PHP is awesome".
"Of course" $she agreed.
TEXT;

echo $text;

//ejemplo 2
//---------------------------------------------------

$title = 'My site';

$header = <<<HEADER
<header>
    <h1>$title</h1>
</header>
HEADER;
echo $header;