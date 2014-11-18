<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_article extends CI_Model
{
    public function insert_Article($data1, $data2,$data3){
        $data=array('Arti_Title'=>$data1,'Arti_Content'=>$data2,'userID'=>$data3);
        $this->db->insert('article',$data);
    }

    public function get_Article(){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title,userID FROM article");
        return $query->result();
    }

    public function by_userID($data){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title FROM article WHERE userID='".$data."'");
        return $query->result();
    }

    public function by_Arti_ID($data){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title,Arti_Content FROM article WHERE Arti_ID='".$data."'");
        return $query->result();
    }

    public function update_Article($data1,$data2,$data3){
        $query
    }
}


/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-17
 * Time: 3:57 PM
 */ 