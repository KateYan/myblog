<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Model{

    private $uid;
    private $uname;
    private $password;
    private $email;
    public  $works=array();

    function __construct(){
        parent::__construct();
    }

    public function initiate($uid){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('uid',$uid);
        $query = $this->db->get();
        if($query->num_rows()==1){

            $user=$query->row(0);
            $this->uid=$user->uid;
            $this->email=$user->email;
            $this->password=$user->password;

            $this->db->select('*');
            $this->db->from('article');
            $this->db->where('authorID',$uid);
            $query1=$this->db->get();
            if($query1->num_rows()==0){
                $this->works=null;
            }else{
                $this->works=array()
            }
        }
        return false;
    }

}
    /**
     * Created by PhpStorm.
     * User: cecil_000
     * Date: 11/23/2014
     * Time: 5:22 PM
     */
{
}