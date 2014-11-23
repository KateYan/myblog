<?php //if (!defined('BASEPATH')) {
//    exit('No direct script access allowed');
//}
//
//class Article_model extends CI_Model
//{
//    public $arti_id;
//    public $arti_title;
//    public $arti_content;
//    public $arti_editorname;
//
//    public function __construct(){
//        parent::__construct();
//    }
//
//    public function initiate($arti_id)
//    {
//        $sql = "SELECT article.Arti_Title,article.Arti_Content, user.UserName FROM article, user WHERE article.Arti_ID = '".$arti_id."' AND article.userID=user.UserID ";
//        $query = $this->db->query($sql);
//        if($query->num_rows()==0){
//            return false;
//        }elseif($query->num_rows()>1){
//            return false;
//        } else{
//            $article=$query->row(0);
//            $this->arti_id=$arti_id;
//            $this->arti_title = $article->article.Arti_Title;
//            $this->arti_content = $article->article.Arti_Content;
//            $this->arti_editorname = $article->user.UserName;
//            return $this;
//        }
//    }
//
//
////    public function __construct($arti_id, $arti_title, $arti_content, $arti_editorname)
////    {
////        $this->arti_id = $arti_id;
////        $this->arti_title = $arti_title;
////        $this->arti_content = $arti_content;
////        $this->arti_editorname = $arti_editorname;
////
////    }
//
//
//    public  function __get($property_name){
//        if(isset($this->$property_name)) {
//            return($this->$property_name);
//        }
//        else {
//            return(NULL);
//        }
//    }
//
//    public function __set($property_name, $value){
//        $this->$property_name = $value;
//    }
//}
//
///**
// * Created by PhpStorm.
// * User: cecil_000
// * Date: 2014-11-20
// * Time: 5:38 PM
// */