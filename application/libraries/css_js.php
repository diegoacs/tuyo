<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * summary
 */
class Css_js 
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function css($rute){

    	return "<link rel='stylesheet' href='".base_url("assets/".$rute['rute'])."'>";

    }

    public function js($rute){

    	return "<script src='".base_url("assets/".$rute['rute'])."'></script>";

    }
}

?>