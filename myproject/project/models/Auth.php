<?php
namespace Project\Models;
	use \Core\Model;

	class Auth extends Model {
        public function auth($login,$password){
            $user=$this->findOne("SELECT * FROM admins WHERE login='$login' AND password='$password'");
            if (!empty($user)) {
                return $user;
            } 
            return;        
        }
    }