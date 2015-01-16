<?php
include("globals.php");
print_r($_POST);

// Sanitize incoming POST array
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
pre_r($_POST); die();
?>