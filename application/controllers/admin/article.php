<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Article extends MY_Controller{

    public function index(){

    }

    //Edit existing article with new title or new content
    //Part one: show existing infor and waiting for change
    //(part two is located in controllers/formcontrol.php)
    //(part two is saving editted article)
    public function Edit(){
        $data['pagename']="Edit Article";
        $data['pagetitle']="Record Your Mind:";
        $this->load->view("components/header",$data);
        $editid=$this->input->get('edit_id');
        $this->load->model("model_get");
        $data['results']=$this->model_get->findArticle($editid);
        $this->load->view("admin/user/edit",$data);
        $this->load->view("components/footer");
    }

    // Once an article is deleted
    // reload the manage center to show the new list of article
    public function Delete(){
        $arti_id=$this->input->get('delete_id');
        $this->load->model("model_get");
        $this->model_get->deleteArticle($arti_id);

        redirect('admin/user/loged');
    }
    // create new article under current user's id
    //Part One: show the create page for entering infor
    public function NewArticle(){
        $data['pagename']="Create New Article";
        $data['pagetitle']="Record Your Mind:";
        $this->load->view("components/header",$data);
        $this->load->view("admin/user/newarticle");
//        if($this->input->post('save')){
//            $title=$this->input->post('title');
//            $content=$this->input->post('content');
//            $userid='2';
//            $this->load->model("model_get");
//            $this->model_get->saveArticle($title,$content,$userid);
//        }

        $this->load->view("components/footer");
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-19
 * Time: 3:48 PM
 */ 