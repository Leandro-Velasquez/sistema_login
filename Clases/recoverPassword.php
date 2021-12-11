<?php
use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\Exception;

require dirname(__DIR__)."../phpmailer/phpmailer/src/Exception.php";
require dirname(__DIR__)."../phpmailer/phpmailer/src/PHPMailer.php";
require dirname(__DIR__)."../phpmailer/phpmailer/src/SMTP.php";
require dirname(__DIR__)."../Clases/db.php";



Class RecoverPassword extends Db{

    public function generateNewPassword(){
        return rand(10000000, 99999999);
    }

    public function generateToken($email){
        return md5($this->getId($email) . time() . rand(1000, 9999));
    }
}
?>