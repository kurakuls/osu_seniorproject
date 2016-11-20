<?php

require_once(PROJECT_PATH.'/PageBuilders/Base.php');

class AuthenticationManager extends Base {

   protected $authenticator;

   function __construct() {
      parent::__construct();
      $this->authenticator = getHelperClass('authentication/','auth');

   }

   public function getErrorMsg() {
   
      $message = '';

      if (isset($this->errorMessage)) {
         $message = $this->errorMessage;         
      }
      else {
         $message = $this->authenticator->errormsg;
      }

      return $message;
   }

   public function getSuccessMsg() {

      if (isset($this->successMessage)) {
         $message = $this->successMessage;
      }
      else {
         $message = $this->authenticator->successmsg;
      }
      
      return $message;
   }

   protected function startSession($email, $accesslevel) {

      // Stores Session in session table
      $this->authenticator->newsession($email);
      $_SESSION['username'] = $email;
      $_SESSION['accessLevel'] = $accesslevel;
   }


}