<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_get extends CI_Model
{

    public $aid;
    public $title;
    public $content;
    public $author;

    public function initiate($aid)
    {
        $sql = "SELECT article.title as title,article.content as content, user.uname as uname FROM article, user WHERE article.aid = '".$aid."' AND article.authorID=user.uid ";
        $query = $this->db->query($sql);
        if($query->num_rows()==0){
            return false;
        }elseif($query->num_rows()>1){
            return false;
        } else{
            $article=$query->row(0);
            $this->aid=$aid;
            $this->title = $article->title;
            $this->content = $article->content;
            $this->author = $article->author;
            return $this;
        }
    }


    // work for main page to show all the articles from database,
    // no need to choose based on id or authorID
//    public function getArticle(){
//        $query=$this->db->query("SELECT aid, title,authorID FROM article");
//        return $query->result();
//    }


    // once the main page's article link is clicked
    //based on the article id collected by get method
    //show the article's title and content to view
    public function findArticle($data){
        $query=$this->db->query("SELECT aid, title,content FROM article WHERE aid='".$data."'");
        return $query->result();
    }

    //once the user want to create a new article
    //this function using user id and title and content to
    //insert a new row into table "article"
//    public function saveArticle($data1, $data2,$data3){
//    $data=array('title'=>$data1,'content'=>$data2,'authorID'=>$data3);
//        $this->db->insert('article',$data);
//    }

//    //based on the input username and password
//    //once  "login " is clicked
//    //check if there is a math in "user"
    public function logIn_match($data1,$data2){
        $query=$this->db->query("SELECT uid, uname FROM user WHERE uname='" . $data1 . "' AND password='" . $data2 . "'");
            return $query->num_rows();
    }

    public function logIn_user($data1,$data2){
        $query=$this->db->query("SELECT uid, uname FROM user WHERE uname='" . $data1 . "' AND password='" . $data2 . "'");
        return $query->result();
    }

    //
    //
    //
    public function userArticle($data){
        $query=$this->db->query("SELECT aid, title FROM article WHERE authorID='".$data."'");
        return $query;

    }

    public function deleteArticle($data){
        $this->db->delete('article',array('aid'=>$data));
    }

    //once there is one user loged in
    //he can edit existing article witn new title and article
    //update existing article
    public function updateArticle($data1, $data2,$data3){
        $this->db->query("UPDATE article SET title='".$data1."', content='".$data2."' WHERE aid='".$data3."'");
    }
//    public function getEditor(){
//        $query['UserName']=$this->db->query("SELECT UserName FROM user WHERE authorID='".$article['authorID']."'");
//    }

    public function newUser($data1,$data2,$data3){
        $data=array('uname'=>$data1,
                    'email'=>$data2,
                    'password'=>$data3);
        $this->db->insert('user',$data);
        $query=$this->db->query("SELECT @@IDENTITY AS 'Identity'");
        return $query;
    }

    public function nameCheck($data){
        $query=$this->db->query("SELECT * FROM user WHERE uname='" . $data . "'");
        return $query->num_rows();
    }

    public function emailCheck($data){
        $query=$this->db->query("SELECT * FROM user WHERE email='" . $data . "'");
        return $query->num_rows();
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-14
 * Time: 3:34 PM
 */ 