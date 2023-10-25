<?php

// sanitize the contact
$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);

// check the selected value against the original values
if ($contact && array_key_exists($contact, $contacts)) {
	$contact = htmlspecialchars($contact);
} else {
	$errors['contact'] = 'Please select at least an option.';
}

if (count($errors)) {
	require __DIR__ .  '/get.php';
} else {
	echo <<<html
	You selected to be contacted via <strong> $contact</strong>.
	<a href="index.php">Back to the form</a>
	html;
}
