<?php
class Page
{
    var $db;
    
    function Page($db = false) {
        $this->db = $db;
        return true;
    }
    function greetings() {            
        echo "Greetings from the Page Class!";            
    }
    
    function getPage($page) {
        $sql = "SELECT * FROM `pages` WHERE `page` = '".$page."'";
        $res = $this->db->getAll($sql);
        
        return $res;
     
        
    }
    
    
    
    

}