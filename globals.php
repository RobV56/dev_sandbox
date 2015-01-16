<?php
session_start();
include_once('php/settings.php'); // setup values and arrays

// $days = array(
    // 'Sunday',
    // 'Monday',
    // 'Tuesday',
    // 'Wednesday',
    // 'Thursday',
    // 'Friday',
    // 'Saturday'
// );
$hours = array();
for ($i=0; $i <= 12; $i++) {
	$hours[$i] = $i;
}
$mins = array();
for ($i=0; $i <= 60; $i+=5) {
	if ($i < 10){
		$mins['0'.$i] = '0'.$i;
	} else {
		$mins[$i] = $i;
	}
}
function __autoload($class_name) {
    require_once 'lib/' . $class_name . '.php';
}

// Uncomment if pw protecting site
$auth = new User();

function pre_r($val) {
	echo "<pre>";
	print_r($val);
	echo "</pre>";
	return;
}

function verify_fields($data, $required)
{
	foreach($data as $field => $value){

		if(in_array($field, $required)) {
			if (empty($value)) {
				return false;
			}
		}
	}

	return true;
}

function valid_email($email)
{
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
		return true;
	} else {
		return false;
	}
}

function redirect_to($value)
{
	header("Location: ".$value);
	die();
}
function redirect($value)
{
	header("Location: ".$value);
	die();
}

function format_date($val)
{
	return date("M d, Y", strtotime($val));
}

function format_date_news($val)
{
	return date("M Y", strtotime($val));
}
function format_date_events($val)
{
	return date("M d", strtotime($val));
}

function format_time($t){
    return date("g:i a", strtotime($t));
    $time = explode(":", $t);
    $time[0] = ltrim($time[0], '0');
    $h = ($time[0] > 12) ? ($time[0] - 12) : $time[0];
    $m = $time[1];
    $ap = ($time[0] > 12 && $time[0] < 24) ? 'pm': 'am';
    return ($h . ":". $m . " ".$ap);
}
function format_money($val){
	return "$". number_format($val, 2);
}
function truncate($phrase, $max_words)
{
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...'  ;
   return $phrase;
}

/**
 * set_flash
 * sets the flash session for being displayed, pretty much a notification message
 *
 * @return boolean
 **/
function set_flash($content,$type)
{
	$_SESSION['flash'][$type] = $content;
	return true;
}

/**
 * show_flash
 *
 * @return String
 **/
function show_flash($type)
{
	$content = null;

	if (!empty($_SESSION['flash'][$type])) {
		$content = '<div class="'.$type.' notification">'.$_SESSION['flash'][$type].'</div>';
		unset($_SESSION['flash'][$type]);
	}

	return ($content) ? $content : false;
}

function save_image ( $field, $path, $file_name ) {
	//pre_r($_FILES); die();
	if ( !is_dir($path) ) {
		mkpath( $path );
	}
	//pre_r($_FILES);
	if ( move_uploaded_file($field, $path . $file_name) ) {
		return true;
	} else {
		return false;
	}
}
function save_doc ( $field, $path, $file_name ) {
	//pre_r($_FILES); die();
	if ( !is_dir($path) ) {
		mkpath( $path );
	}
	//pre_r($_FILES);
	if ( move_uploaded_file($field, $path . $file_name) ) {
		return true;
	} else {
		return false;
	}
}


function mkpath($path){
  $dirs=array();
  $path=preg_replace('/(\/){2,}|(\\\){1,}/','/',$path); //only forward-slash
  $dirs=explode("/",$path);
  $path="";
  foreach ($dirs as $element)
      {
        $path.=$element."/";
        if(!is_dir($path))
          {
          if(!mkdir($path)){ echo "something was wrong at : ".$path; return 0; }
          }
      }
  //echo("<B>".$path."</B> successfully created");
}

function protected_page(){
	global $user;
	if (!$user->loged_in()){
		set_flash('error', 'you must login');
		redirect_to('index.php');
	}
}

// makes the options for a select box
function make_select( $options, $selected = false, $ignore_key = false) {
	$content = '';
	foreach( $options as $key => $val ) {
		$key = (is_numeric($key) && $ignore_key == true) ? $val : $key;
		if ($selected == $key) {
			$content .= "<option value=\"".$key."\" selected=\"true\">".stripslashes($val)."</option>";
		} else {
			$content .= "<option value=\"".$key."\">".$val."</option>";
		}
	}
	return $content;
}

// this is to grab the extension of a file, in lower case
function file_extension ( $file_name ) {
	$a = explode('.', $file_name);
	return strtolower($a[1]);
}

function pluralize($part) {

	if (substr($part, -1, 1) == 'y') {
		$parent = trim($part, 'y') . 'ies'; // if a word ends in y, take the 'y' off and add 'ies'
	} elseif (substr($part, -1, 1) == 's') {
			$parent = $part . 'es';
	} else {
		$parent = $part . 's';
	}
	return $parent;
}

function simple_format($string) {
	$string = strtolower($string);
	$string = str_replace(" ", "_", $string);
	return $string;
}
function show($content) {
	$con = stripslashes($content);
	return $con;
}

/***********************************************************
***  Protect page access with a session variable check   ***
***********************************************************/
//

/* function protect_access() {
    if ($_SESSION['auth'] == 1) {
        // Allow page access
    }else{
        header("Location: login.php");
        exit;
    }
} */

function clean_input($dirty) {
    echo "Dirty= " . $dirty; die();
    $clean = htmlentities($dirty, ENT_QUOTES, 'UTF-8');
    return $clean;
}