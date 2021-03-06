<?php

date_default_timezone_set('Etc/UTC');

require_once 'PHPMailer/PHPMailerAutoload.php';
require_once 'PHPMailer/class.smtp.php';
require_once 'PHPMailer/class.phpmailer.php';

/**
 * Description of MailPHPMailer classe criada para fazer a fronteira com o pacote smtp PhpMailer
 * @version 1.0
 * @author bruno.blauzius 
 */
class MailPHPMailer {
    
    public $MAIL = null;
    
    public $emailRemetente = 'contato@mynight.com.br';
    
    public $nomeRemetente  =  'My Night - suporte';
    
    
    public function __construct() {
        
        //Create a new PHPMailer instance
        $this->MAIL = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $this->MAIL->isSMTP(true);
        //Whether to use SMTP authentication
        $this->MAIL->SMTPAuth = true;
        //setando que minha saida é html
        $this->MAIL->isHTML(true); 
        //setando minha linguagem de erro
        $this->MAIL->setLanguage("br", "Library/language/");
        
        $this->MAIL->SMTPSecure = 'ssl';
        //encode do email
        $this->MAIL->CharSet = 'UTF-8';
            
        // Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->MAIL->SMTPDebug =  0;
        //Ask for HTML-friendly debug output
        $this->MAIL->Debugoutput = 'html';
        //Set the hostname of the mail server
        $this->MAIL->Host = "smtp.gmail.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $this->MAIL->Port = 465;
        //Username to use for SMTP authentication
        $this->MAIL->Username = "mynight.reservas@gmail.com";
        //Password to use for SMTP authentication
        $this->MAIL->Password = "mynight01";
    }
    
    public function setRemetente( $email = null, $nome = null) {
        
        if( !empty($email) && !empty($nome) ){
            $this->emailRemetente = $email;
            $this->nomeRemetente  = $nome;
        }
        $this->MAIL->setFrom( $this->emailRemetente, $this->nomeRemetente );
    }
    
    
    public function setDestinatario($email, $nome ) {
        $this->MAIL->addAddress($email, $nome);
    }
    
    public function setReplayTo($email, $nome ) {
        $this->MAIL->addReplyTo($email, $nome);
    }
    
    public function setAssunto($assunto) {
        $this->MAIL->Subject = $assunto;
    }
    
    public function setCC( $address, $name ){
        $this->MAIL->addCC($address, $name);
    }
    
    public function setBCC( $address, $name ){
        $this->MAIL->addBCC($address, $name);
    }
    
    public function setBody($corpo) {
        $this->MAIL->Body = $corpo;
    }
    
    public function getError(){
        return $this->MAIL->ErrorInfo;
    }
    
    /**
     * @todo metodo que envia o email 
     * @version 1.0
     */
    public function sendMail() {
        try{
            
            if (!$this->MAIL->send()) {
                throw new Exception( "Mailer Error: " . $this->MAIL->ErrorInfo );
            }
            
            $this->MAIL->clearAddresses();
            $this->MAIL->clearAttachments();
            $this->MAIL->clearAllRecipients();
            
            return TRUE;
            
        } catch (Exception $ex) {
            throw $ex;
        }        
    }
    
}

/**
    $objeto = new MailPHPMailer();
    $objeto->setAssunto('É o teste OOP');
    $objeto->setRemetente();
    $objeto->setDestinatario('bruno_newstudio@hotmail.com', 'Bruno Blauzius');
    $objeto->setBody('<b>Ok foi o e-mail é um sucesso</b>');
    $objeto->sendMail();
 */
