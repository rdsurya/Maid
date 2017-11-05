<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author user
 */
class User {
    //put your code here
    public static $keyUserName="USER_NAME";
    public static $keyUserType="USER_TYPE";   
    public static $keyUserObj="USER";
    public static $keyName = "NAME";


    //attribute of user
    private $userName;
    private $userType;
    private $name;
   
    function __construct($usserName, $userType, $name) {
        $this->userName=$usserName;
        $this->userType=$userType;
        $this->name=$name;
   }
   
   public function  getUserName(){
       return $this->userName;
   }
   
   public function getUserType(){
       return $this->userType;
   }
   
   public function  getName(){
       return $this->name;
   }
}
