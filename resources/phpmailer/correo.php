<?php

require_once("resources/phpmailer/PHPMailerAutoload.php");

class Correo {

    private $mail;
    private $address;
    private $subject;
    private $body;

    public function __CONSTRUCT(){
        $this->mail = new PHPMailer;
    }

    public function sendEmail(){

        $this->mail->IsSMTP(); // sets method to SMTP;
        $this->mail->Host = "smtp.gmail.com";                     // SMTP server
        $this->mail->Username = "lopezsandi1666@gmail.com";     // SMTP username
        $this->mail->Password = "luis666666";                         // SMTP password
        $this->mail->SMTPAuth = true;                             // turn on SMTP authentication
        $this->mail->SMTPKeepAlive = true;
        $this->mail->Mailer="smtp";
        $this->mail->Port = 587;
        $this->mail->setFrom('lopezsandi1666@gmail.com', 'Back2Home');
        $this->mail->addAddress($this->address);

        //$this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $this->mail->isHTML(true);                                  // Set email format to HTML

        $this->mail->Subject = $this->subject;
        $this->mail->Body    = $this->body;
        //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $this->mail->send();
    }

    public function setAddress($_address){
        $this->address = $_address;
    }

    public function setSubject($_subject){
        $this->subject = $_subject;
    }

    public function setBody($_body){
        $this->body = $_body;
    }

}

?>
