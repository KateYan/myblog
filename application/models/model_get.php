<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_get extends CI_Model
{

    public function getArticle(){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title,userID FROM article");
        return $query->result();
    }
    public function findArticle($data){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title,Arti_Content FROM article WHERE Arti_ID='".$data."'");
        return $query->result();
    }
    public function saveArticle($data1, $data2,$data3){
    $data=array('Arti_Title'=>$data1,'Arti_Content'=>$data2,'userID'=>$data3);
        $this->db->insert('article',$data);
    }
    public function logIn($data1,$data2){
        $query=$this->db->query("SELECT UserID, UserName FROM user WHERE Username='" . $data1 . "' AND UserPassword='" . $data2 . "'");
            $row=$query->result();
            return $row;

    }
    public function userArticle($data){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title FROM article WHERE userID='".$data."'");
        return $query->result();
    }
    public function updateArticle($data1, $data2,$data3){
        $this->db->query("UPDATE article SET Arti_Title='".$data2."', Arti_Content='".$data3."' WHERE Arti_ID='".$data1."'");
    }
//    public function getEditor(){
//        $query['UserName']=$this->db->query("SELECT UserName FROM user WHERE UserID='".$article['userID']."'");
//    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-14
 * Time: 3:34 PM
 */ 