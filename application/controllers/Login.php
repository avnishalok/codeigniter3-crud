<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		/*
		parent::__construct() method: it calls the constructor of its parent class (CI_Controller) and loads the model, so it can be used in all other methods in this controller.
		*/
        parent::__construct();
        //load the model Login_model
        $this->load->model('login_model');
					
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }

     /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(isset($isLoggedIn) && $isLoggedIn == TRUE)
        {
        	redirect('/dashboard');
        }
        else
        {
        	$data['pageTitle'] = 'Login';
            //send css to login page to load it dynamically. Only for login page!!!
            $data['loginCss'] = CHEQUE_CSS.'login.css';
            $this->load->view(LOGIN_PAGE,$data);
            //redirect('/signin');
        }
    }

       
	/**
     * This function is used to logged in user
     */
    public function loginMe()
    {   
        $this->load->library('form_validation');  
        $this->form_validation->set_rules('username', 'User', 'required|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginCheck($username, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res->userId,                    
                                            'role'=>$res->roleId,
                                            'name'=>$res->userName,
                                            'isLoggedIn' => TRUE
                                    );
                                    
                    $this->session->set_userdata($sessionArray);
                    
                    redirect('/dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');              
                redirect('/signin');
            }
        }
    }
}
