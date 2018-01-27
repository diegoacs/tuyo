<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * summary
 */
class Sendmail 
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function send($data){

    
        // enviar correo electronico para activacion
        $to = $data['mail'];
        $subject = $data['subject'];

        $message = $data['msg'];

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: ' .$data['from'] . "\r\n";
        //$headers .= 'Cc: castellanossantamaria@gmail.com' . "\r\n";

        mail($to,$subject,$message,$headers);


    }

}

?>