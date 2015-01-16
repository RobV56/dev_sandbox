<?php
include("globals.php");

/* 
 * Form submitted without javascript enabled. 
 * Send success message, but do not process anything.
 */ 

$_SESSION['talent']['msg'] = "Thank You. Your application has been sent.";
header("Location: contact.php?success");
die();

?>
