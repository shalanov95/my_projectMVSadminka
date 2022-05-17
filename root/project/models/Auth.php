<?php
namespace Project\Models;
	use \Core\Model;

	class Auth extends Model {
        public function auth($login,$password){
            $user=$this->findOne("SELECT * FROM `admin` WHERE login='$login'");
            if (!empty($user)) {
                $hash = $user['password']; 
                if (password_verify($password, $hash)) {
                    // все ок, авторизуем...
                    return $user;
                } else {
                    // пароль не подошел, выведем сообщение
                    return;
                }
            } else {
                // пользователя с таким логином нет, выведем сообщение
                return;
            }
        }
    }