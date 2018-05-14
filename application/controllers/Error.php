<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Error
 * class to control errors.
 * @author : Avnish Tiwary
 */
class Error extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        if($this->isLoggedIn('/pageNotFound')){
            redirect('/signin');
        }   
    }
    
}

?>