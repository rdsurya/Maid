<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CheckSession
 *
 * @author user
 */
class CheckSession {
    //put your code here
    private $sessionStatus;
    
    function __construct() {
        $this->sessionStatus=false;
    }
    
    public function isSessionValid(){
        $this->sessionStatus = isset($_SESSION['USERNAME']);
        
        return $this->sessionStatus;
    }
    
    public function destroySession(){
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
}
