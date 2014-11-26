<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 11/25/2014
 * Time: 10:06 PM
 */
//require 'post.php';
class Blog extends CI_Model{

    public function getall(){
        $sql = "SELECT article.aid as aid,article.title as title,article.content as content, user.uname as uname FROM article, user WHERE article.authorID = user.uid ";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $i=0;
//            $blog=array();
            while($i<$query->num_rows()){
                $blog=$query->row($i);
                $data=array('aid'=>$blog->aid,'title'=>$blog->title,'content'=>$blog->content,'author'=>$blog->uname);
                $this->load->model('Post');
                $article[$i] = new Post($data);
                $i++;
            }
        }else return NULL;

        return $article;
    }

} 