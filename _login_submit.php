<?php
include_once("globals.php");
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//$data = $_POST['login'];
//pre_r($_POST); //die();



$user = new User();
//echo $user->greetings(); //die();

$res = $user->login($_POST['user'],$_POST['pass']);
//pre_r($_SESSION);
//die();

header("Location: index.php"); die();

?>