<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
        //count_all functino must be first if you run select query
        $total = $this->db->count_all(CHEQUE_TABLE);
        if($total > 0){
            return $total;
        }
        else{
            return FALSE;
        }
    }
    
    /**
     * This function is used to get the cheque listing.
     */
    function checkListing()
    {
        $this->db->select('*');
        $this->db->from(CHEQUE_TABLE);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewCheck($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert(CHEQUE_TABLE, $userInfo);  
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    /**
     * This function is used to update records
     * @return number $insert_id : This is last inserted id
     */
    function updateCheck($userInfo,$id)
    {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update(CHEQUE_TABLE, $userInfo);
        $affected_rows = $this->db->affected_rows();
        $this->db->trans_complete();
        return $affected_rows;
    }
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array of user information
     */
    function getCheckInfo($checkId)
    {
        $this->db->select('*');
        $this->db->from(CHEQUE_TABLE);
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $checkId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }
}

  