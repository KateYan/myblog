<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_get extends CI_Model
{

    // work for main page to show all the articles from database,
    // no need to choose based on id or userid
    public function getArticle(){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title,userID FROM article");
        return $query->result();
    }

    // once the main page's article link is clicked
    //based on the article id collected by get method
    //show the article's title and content to view
    public function findArticle($data){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title,Arti_Content FROM article WHERE Arti_ID='".$data."'");
        return $query->result();
    }

    //once the user want to create a new article
    //this function using user id and title and content to
    //insert a new row into table "article"
    public function saveArticle($data1, $data2,$data3){
    $data=array('Arti_Title'=>$data1,'Arti_Content'=>$data2,'userID'=>$data3);
        $this->db->insert('article',$data);
    }

    //based on the input username and password
    //once  "login " is clicked
    //check if there is a math in "user"
    public function logIn_match($data1,$data2){
        $query=$this->db->query("SELECT UserID, UserName FROM user WHERE Username='" . $data1 . "' AND UserPassword='" . $data2 . "'");
            return $query->num_rows();
    }

    public function logIn_user($data1,$data2){
        $query=$this->db->query("SELECT UserID, UserName FROM user WHERE Username='" . $data1 . "' AND UserPassword='" . $data2 . "'");
        return $query->result();
    }

    //
    //
    //
    public function userArticle($data){
        $query=$this->db->query("SELECT Arti_ID, Arti_Title FROM article WHERE userID='".$data."'");
        return $query->result();
    }

    public function deleteArticle($data){
        $this->db->delete('article',array('Arti_ID'=>$data));
    }

    //once there is one user loged in
    //he can edit existing article witn new title and article
    //update existing article
    public function updateArticle($data1, $data2,$data3){
        $this->db->query("UPDATE article SET Arti_Title='".$data1."', Arti_Content='".$data2."' WHERE Arti_ID='".$data3."'");
    }
//    public function getEditor(){
//        $query['UserName']=$this->db->query("SELECT UserName FROM user WHERE UserID='".$article['userID']."'");
//    }

    public function newUser($data1,$data2,$data3){
        $data=array('UserName'=>$data1,
                    'Email'=>$data2,
                    'UserPassword'=>$data3);
        $this->db->insert('user',$data);
        $query=$this->db->query("SELECT @@IDENTITY AS 'Identity'");
        return $query;
    }

    public function nameCheck($data){
        $query=$this->db->query("SELECT * FROM user WHERE UserName='" . $data . "'");
        return $query->num_rows();
    }

    public function emailCheck($data){
        $query=$this->db->query("SELECT * FROM user WHERE Email='" . $data . "'");
        return $query->num_rows();
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-14
 * Time: 3:34 PM
 */ 