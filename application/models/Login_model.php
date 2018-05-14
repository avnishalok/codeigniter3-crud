<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $user : This is userId
     * @param string $password : This is encrypted password of the user
     */
    function loginCheck($user, $password)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.userName, BaseTbl.roleId');
        $this->db->from(LOGIN_TABLE.' as BaseTbl');
        $this->db->where('BaseTbl.userId', $user);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        $user = $query->result();
                    
        if(!empty($user)){
            if(verifyHashedPassword($password, $user[0]->password)){
                //authorized User. return user data.
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
}

?>