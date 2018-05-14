<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Avnish alok
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Cheque : Dashboard';
        
        $this->loadViews(ADMIN_SECTION, $this->global);
    }
    
    /**
     * This function is used to load the user list
     */
    function loadListing()
    {
            $this->global['userRecords'] =  $this->user_model->checkListing();
            
            $this->global['pageTitle'] = 'Cheque : Listing';
            
            $this->loadViews(LOAD_DATA, $this->global);
    }

           
    /**
     * This function is used to add new user to the system
     */
    function addNewData()
    {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('check_no','Check No.','required|max_length[30]');
            $this->form_validation->set_rules('street_address','Address','trim|required|max_length[200]');
            $this->form_validation->set_rules('phone_no','Phone','trim|required|max_length[128]');
            $this->form_validation->set_rules('city','City','trim|required|max_length[50]');
            $this->form_validation->set_rules('amount','Amount','trim|required|max_length[10]|min_length[1]|numeric');
            $this->form_validation->set_rules('state','State','trim|required|max_length[50]');
            $this->form_validation->set_rules('zip_code','Zip Code','trim|required|max_length[15]|numeric');
            $this->form_validation->set_rules('memo_1','Memo1','trim|required|max_length[200]');
            $this->form_validation->set_rules('select_company','Company','trim|required|max_length[50]');
            $this->form_validation->set_rules('bank_name','Bank Name','trim|required|max_length[80]');
            $this->form_validation->set_rules('bank_address','Bank Address','trim|required|max_length[200]');
            $this->form_validation->set_rules('bank_city','Bank City','trim|required|max_length[80]');
            $this->form_validation->set_rules('bank_state','Bank State','trim|required|max_length[80]');
            $this->form_validation->set_rules('routing','Routing No.','trim|required|max_length[50]');
            $this->form_validation->set_rules('checking_account','Account No.','trim|required|max_length[50]');
            $this->form_validation->set_rules('confirm_account','Account',
                'trim|required|matches[checking_account]|max_length[50]',
                array('matches' => 'Ac-no. and Confirm Ac-no. must be same.')
                );

            if($this->form_validation->run() == FALSE)
            {
               $this->index();
            }
            else
            {   
                $data = array(
                'custName' => $this->input->post('name'),
                'custEmail' => $this->input->post('email'),
                'checkNo' => $this->input->post('check_no'),
                'custStreetAddress' => $this->input->post('street_address'),
                'custPhone' => $this->input->post('phone_no'),
                'custCity' => $this->input->post('city'),
                'amount' => $this->input->post('amount'),
                'custState' => $this->input->post('state'),
                'custZipCode' => $this->input->post('zip_code'),
                'memo1' => $this->input->post('memo_1'),
                'memo2' => $this->input->post('memo_2'),
                'cmp' => $this->input->post('select_company'),
                'bankName' => $this->input->post('bank_name'),
                'bankAddress' => $this->input->post('bank_address'),
                'bankCity' => $this->input->post('bank_city'),
                'bankState' => $this->input->post('bank_state'),
                'routingNo' => $this->input->post('routing'),
                'accountNo' => $this->input->post('checking_account'),
                'confirmAccountNo' => $this->input->post('confirm_account'),
                'createdDtm' => date('Y-m-d H:i:s'),
                );
                
                $result = $this->user_model->addNewCheck($data);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<strong>Bingo! </strong>Check Details Added');
                }
                else
                {
                    $this->session->set_flashdata('error', '<strong>Error! </strong>Adding Check Details failed!!!');
                }
                
                redirect('/dashboard');
            }
        }

     /**
     * This function is used to display data in PDF file.
     * function is using mpdf api to generate pdf.
     * @param number $id : This is unique id of table.
     */
    function generatePDF($id){
        require APPPATH . '/third_party/mpdf/vendor/autoload.php';
        //$mpdf=new mPDF();
        $mpdf = new mPDF('utf-8', 'Letter', 0, '', 0, 0, 7, 0, 0, 0);

        $checkRecords =  $this->user_model->getCheckInfo($id);      
        foreach ($checkRecords as $key => $value) {
            $data['info'] = $value;
            $filename = $this->load->view(CHEQUE_VIEWS.'index',$data,TRUE);
            $mpdf->WriteHTML($filename); 
        }
        
        $mpdf->Output(); //output pdf document.
        //$content = $mpdf->Output('', 'S'); //get pdf document content's as variable. 

    }

    /**
     * This function is called by Js callCrudAction(action,id). This method post data to jsMethod()
     * jsMethod fetch some data and return json data to callCrudAction(action,id)
     */
    function jsMethod(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            $jsonData = json_decode(file_get_contents("php://input")); //get json data
            $jsonData = (array)$jsonData;
            //print_r((array)$jsonData); exit;
            if(isset($jsonData['checkId'])){
                $checkId = trim($jsonData['checkId']);
                $checkRecords = $this->user_model->getCheckInfo($checkId);
                //$this->output->set_content_type('application/json');
                echo json_encode($checkRecords);
                //print_r(array($checkRecords));
            }
            if(isset($jsonData[0]->value)){
                $data = array(
                'custEmail' => trim($jsonData[0]->value),
                'custName' => trim($jsonData[1]->value),
                'checkNo' => trim($jsonData[2]->value),
                'custStreetAddress' => trim($jsonData[3]->value),
                'custPhone' => trim($jsonData[4]->value),
                'custCity' => trim($jsonData[5]->value),
                'amount' => trim($jsonData[6]->value),
                'custState' => trim($jsonData[7]->value),
                'custZipCode' => trim($jsonData[8]->value),
                'memo1' => trim($jsonData[9]->value),
                'cmp' => trim($jsonData[10]->value),
                'bankName' => trim($jsonData[11]->value),
                'bankAddress' => trim($jsonData[12]->value),
                'bankCity' => trim($jsonData[13]->value),
                'bankState' => trim($jsonData[14]->value),
                'routingNo' => trim($jsonData[15]->value),
                'accountNo' => trim($jsonData[16]->value),
                'updatedDtm' => date('Y-m-d H:i:s'),
                );

                $result = $this->user_model->updateCheck($data, trim($jsonData[17]->value));
                
                if($result > 0)
                {
                    echo '{"message" : "Record Updated."}';
                }
                else
                {
                    echo '{"message" : "Updation Failed!!!"}';
                }
            }
        }
        else{
            echo '{"error" : "No any data found"}';
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:sa'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:sa'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:sa'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
       
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Cheque : 404 - Page Not Found';
        
        $this->loadViews(PAGE_NOT_FOUND, $this->global);
    }
}

?>