<?php
class User
{
    var $db;
    
    function Category($db = false) {
        $this->db = $db;
        return true;
    }
    function greetings() {            
        echo "Greetings from the User Class!";            
    }
    
    function login($user, $pass) {
        global $db;
        
        if ($user == "clientdemo" && $pass == "1q2w3e4r") {
            //echo "You are logged in! Horray!"; 
            $_SESSION['login']['success'] = "You are now logged in."; 
            $_SESSION['auth'] = 1; 
        }else{
            //echo "Nice try. You fail sir! ";
            $_SESSION['login']['error'] = "Login failed. Username and/or Password invalid.";
            $_SESSION['pm_auth'] = NULL; 
        }
    }
    
    function logout(){
        
        // Unset all of the session variables.
        $_SESSION = array();
        
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();  
        
        $_SESSION['logout']['success'] = "You are now logged out. See ya next time!";
        $_SESSION['pm_auth'] = 0;       
           
    }
    function protect_access() {
    if ($_SESSION['auth'] == 1) {
        // Allow page access
    }else{
        header("Location: login.php");
        exit;
    }
}
    
    
    

}