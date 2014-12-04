<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Model{

    public  $aid;
    public  $title;
    public  $content;
    public  $authorID;
    public  $author;
//    private $fillable = array('title','content');


    function __construct(Array $params=array()){
        if(count($params)){
            foreach($params as $key=>$value){
                $this->$key=$value;
            }
        }
    }


//    Based on aid to realize an object article
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
            $this->author = $article->uname;
            return $this;
        }
    }

    //get article object's propertie's value
//    public function __set($name,$value){
//        if(! in_array($name,$this->fillable)){
//            return false;
//        }
//        if(isset($this->$name)){
//            $this->$name = $value;
//        }
//    }
//
//    public function __get($name){
//        return isset($this->$name)? $this->$name : NULL;
//    }
//

    public function getProperty($property){
        if(isset($this->$property)){
            return $this->$property;
        }
        return null;
    }



    // create new object with insert title, content and user id
    public function newPost($postData){
        $this->title = $postData['title'];
        $this->content = $postData['content'];
        $this->aid = null;
        $this->authorID=$postData['authorID'];
        return $this->savePost();
    }
    // create updated object with new title and content
    public function updatePost($updateData){
        $this->aid=$updateData['aid'];
        $this->title=$updateData['title'];
        $this->content=$updateData['content'];
        $this->authorID=$updateData['authorID'];
        return $this->saveUpdate();
    }

    // insert new instance into database
    private function savePost(){
            $sql = "INSERT into article VALUE ('".$this->aid."','".$this->title."','".$this->content."','".$this->authorID."')";
            $query = $this->db->query($sql);
            if($this->db->affected_rows()==1){
                return true;
            }
                return false;
    }

    //update instance from database
    public  function saveUpdate(){
        $sql="UPDATE article SET title='".$this->title."', content='".$this->content."' WHERE aid='".$this->aid."'";
        $query = $this->db->query($sql);
        if($this->db->affected_rows()==1){
            return true;
        }
        return false;
    }
    //delete instance from database
    public function deletePost($id){
        $sql="DELETE FROM article WHERE aid='".$id."'";
        $query = $this->db->query($sql);
        if($this->db->affected_rows()==1){
            return true;
        }
        return false;
    }



}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-14
 * Time: 3:34 PM
 */ 