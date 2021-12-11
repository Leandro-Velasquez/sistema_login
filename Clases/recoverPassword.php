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

    public function sendEmail($email){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

            //Aca tenemos que colocar una direccion de correo y su contraseña, va ser la cuenta desde donde se van a mandar los mails.
            $mail->Username   = "colocamos la direccion";                     //SMTP username
            $mail->Password   = "colocamos la contraseña";                               //SMTP password


            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('colocamos el email', 'colocamos el nombre');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $token = $this->generateToken($email);
            $newPassword = $this->generateNewPassword();

            $this->insertIntoRecoveryTable($email, $newPassword, $token);
            
            $link = "http://localhost/sistema_login/confirmar_recuperar_clave.php?e=$email&t=$token";

            $msg = "<p>Hello " . $this->getUserName($email) . "</p>" .
            "<p>you have requested to recover your password the system has generated a new password for you is: " . $this->generateNewPassword() . "</p>" . 
            "<p>But before you can use it, you must click on this link or copy this code in the URL of your browser: " . $link . "</p>" . 
            "<p>if you have not made this request ignore the message</p>";

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Account recovery';
            $mail->Body    = $msg;

            $mail->send();
            //echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>