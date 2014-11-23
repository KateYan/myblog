<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Post extends CI_Model
{

    public $aid;
    public $title;
    public $content;
    private $authorID;
    public $author;


    public function __construct(){
        parent::__construct();
    }

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

    public function getProperty($property){
        if(isset($this->$property)){
            return $this->$property;
        }
        return null;
    }

    public function newPost($postData){
        $this->title = $postData['title'];
        $this->content = $postData['content'];
        $this->aid = null;
        $this->authorID=$postData['authorID'];
        return $this->savePost();
    }

    public function updatePost($updateData){
        $this->aid=$updateData['aid'];
        $this->title=$updateData['title'];
        $this->content=$updateData['content'];
        $this->authorID=$updateData['authorID'];
        return $this->savePost();
    }


    private function savePost(){
        if(null==$this->aid){
            $sql = "INSERT into article VALUE ('".$this->aid."','".$this->title."','".$this->content."','".$this->authorID."')";
            $query = $this->db->query($sql);
            if($this->db->affected_rows()==1){
                return true;
            }
                return false;
        }
        else{
            $sql="UPDATE article SET title='".$this->title."', content='".$this->content."' WHERE aid='".$this->aid."'";
            $query = $this->db->query($sql);
            if($this->db->affected_rows()==1){
                return true;
            }
                return false;
        }
    }
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