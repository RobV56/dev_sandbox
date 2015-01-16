<?php
include("globals.php");
print_r($_POST);

// Sanitize incoming POST array
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
pre_r($_POST); die();


function fixFilesArray(&$files)
{
    // a mapping of $_FILES indices for validity checking
    $names = array('name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);
 
    // iterate over each uploaded file
    foreach ($files as $key => $part) {
        // only deal with valid keys and multiple files
        $key = (string) $key;
        if (isset($names[$key]) && is_array($part)) {
            foreach ($part as $position => $value) {
                $files[$position][$key] = $value;
            }
            // remove old key reference
            unset($files[$key]);
        }
    }
}

// passed by reference
//fixFilesArray($_FILES['upload']);
 
// all fixed
//pre_r($_FILES['upload']); //die();
 

// Sanitize incoming POST array
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
pre_r($_POST); die();

$formName = 'talent';
$root_file = "form.php";
$url_seperator = "?";
$subject = "Demo Submission";
$filename = 'demo_submissions.txt';
$required = array('First_Name', 'Last_Name', 'Phone', 'Email');

$data = $_POST[$formName];
$_SESSION[$formName] = $data;

function checkEmailAddress($mail){
    $regex = '/\A(?:[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+'
    .'(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@'
    .'(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[a-z]{2}|'
    .'com|org|net|gov|biz|info|name|aero|biz|info|jobs|'
    .'museum)\b)\Z/i';

    if (preg_match($regex, $mail)) {
        return true;
    } else {
        return false;
    }
}

function format_words($val) {
    $val = str_replace("_", " ", $val);
    return ucfirst(strtolower($val));
}

if (empty($data) ){
    header("Location: ".$root_file);
    die();
}

$content = "Submitted On: ".date("M j Y").",";

$email_message = "<strong>".$subject."</strong><hr>";
$email_message .= "<strong>Submitted On:</strong> ".date("M j Y")."<br>";

foreach ($data as $key => $value) {
    $content .= format_words($key) . ": ".$value.",";
    $email_message .= "<strong>".format_words($key) . ":</strong> ".$value."<br>";
}

$content = rtrim($content, ",");
$content .= "\n";

foreach ($required as $key) {
    if ($data[$key] == '') {
        header("Location: ".$root_file.$url_seperator."error=required");
        die();
    }
}

if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }
   fclose($handle);

}

// -------------------------------------------------------
include_once("PHPMailer/PHPMailerAutoload.php");

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
//$mail->Host = "mail.dprodesigns.com"; //testing
$mail->Host = "smtp.1and1.com";

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
//$mail->Username = "sandbox@dprodesigns.com"; // testing
$mail->Username = "webmaster@gdpros.com";

//Password to use for SMTP authentication
//$mail->Password = "1q2w3e4r"; //testing
$mail->Password = "1q2w3e4r";

//Set who the message is to be sent from
//$mail->setFrom('sandbox@dprodesigns.com', 'Sandbox'); //testing
$mail->setFrom('webmaster@gdpros.com', 'GDPros Webmaster');

//Set an alternative reply-to address
//$mail->addReplyTo('sandbox@dprodesigns.com', 'Sandbox'); //testing
$mail->addReplyTo('webmaster@gdpros.com', 'GDPros Webmaster');

//Set who the message is to be sent to
//$mail->addAddress('rob@dpromarketing.com', 'Rob V'); // testing 
$mail->addAddress('newtalent@gdpros.com', 'New Talent');
$mail->addAddress('rob@dpromarketing.com', 'Rob V');
$mail->addAddress('ken@dpromarketing.com', 'Ken B');

//Set the subject line
//$mail->Subject = 'PHPMailer SMTP test'; //testing
$mail->Subject = $subject;

//Create Body content
$mail->Body = $email_message;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('smtp_content.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'You have received a talent submission.';

//Attach an image file from webmaster
//$mail->addAttachment('PHPMailer/examples/images/phpmailer_mini.gif');

//Attach file uploaded by user form




if (isset($_FILES['upload'])) {
$i = 0; 
$cap = count($_FILES['upload']) - 1;
    while ($i <= $cap) {
        //pre_r($_FILES['upload'][$i]);
        if (isset($_FILES['upload'][$i]['type']) && $_FILES['upload'][$i]['type'] != ""){
            
            $allowedExts = array("jpeg", "jpg", "pdf");
            $temp = explode(".", $_FILES['upload'][$i]["name"]);
            $extension = strtolower(end($temp));
            
            $types = array("image/jpeg","image/jpg","image/pjpeg","image/x-png","image/png","application/pdf");
            
            
            if (in_array($_FILES['upload'][$i]["type"], $types)) {
                if (in_array($extension, $allowedExts)) {
                    if ($_FILES['upload'][$i]["size"] < 1048576) {  // #bytes in 1mb
                        if ($_FILES['upload'][$i]["error"] > 0) {
                            echo "Error: " . $_FILES['upload'][$i]["error"] . "<br>";
                        }
                        else {
                            $mail->AddAttachment($_FILES['upload'][$i]['tmp_name'], $_FILES['upload'][$i]['name']);
                        }
                    }
                    else{
                        //echo "Invalid File size.";
                        $_SESSION['talent']['msg'] = "Photo size error. Please check that all images uploaded are JPG or PDF, and are under 1MB each.";
                        header("Location: " . $root_file . $url_seperator . "error");
                        die();
                    }
                }
                else{
                    //echo "Invalid File Extension.";
                    $_SESSION['talent']['msg'] = "Photo type error. Please check that all images uploaded are JPG or PDF, and are under 1MB each.";
                    header("Location: " . $root_file . $url_seperator . "error");
                    die();
                    }
            }
            else{
                //echo "Invalid File Type.";
                $_SESSION['talent']['msg'] = "Photo type error. Please check that all images uploaded are JPG or PDF, and are under 1MB each.";
                header("Location: " . $root_file . $url_seperator . "error");
                die();
            }     
                 
            
        }
        $i++;
    }     
}
        
    

//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    $_SESSION['talent']['msg'] = $mail->ErrorInfo;
    header("Location: " .$root_file . $url_seperator . "error");
    die();
} else {
    //echo "Message sent!";
    $_SESSION['talent']['msg'] = "Thank You. Your application has been sent.";
    header("Location: " . $root_file . $url_seperator . "success");
    die();
}



?>
