<?php
class Post
{

    public $aid;
    public $title;
    public $content;
    public $editorname;

    public function __construct($id){

        $sql = "SELECT article.Arti_Title as title,article.Arti_Content as content, user.UserName as username FROM article, user WHERE article.Arti_ID = '".$id."' AND article.userID=user.UserID ";
        $query = $this->db->query($sql);
        if($query->num_rows()==0){
            return false;
        }elseif($query->num_rows()>1){
            return false;
        } else{
            $article=$query->row(0);
            $this->aid=$id;
            $this->title = $article->title;
            $this->content = $article->content;
            $this->editorname = $article->username;
            return $this;
        }
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getEditorname(){
        return $this->editorname;
    }


}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-14
 * Time: 3:34 PM
 */ 