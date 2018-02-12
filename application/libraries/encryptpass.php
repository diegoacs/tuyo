<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * summary
 */
class Encryptpass 
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function generate_pass($data){

        //encriptar pass y crear usuario
        $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
        $salt = strtr($salt, array('+' => '.'));
        return crypt(escstr($data['password']), escstr($data['key']) . $salt);

    }

    public function compare_pass($data){

        if (crypt(escstr($data['pass']), $data['pss']) == $data['pss']) return true;
        else return false;

    }

}

?>