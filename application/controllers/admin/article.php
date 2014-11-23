<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Article extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){

    }

    //Edit existing article with new title or new content
    //Part one: show existing infor and waiting for change
    //(part two is located in controllers/formcontrol.php)
    //(part two is saving editted article)
    public function Edit($id){
        $data['pagename']="Edit Article";
        $data['pagetitle']="Record Your Mind:";
        $this->load->view("components/header",$data);
        $this->load->model('Post', 'edit');
        $edit = $this->edit->initiate($id);
        $data['edit']=$edit;
        $this->load->view("admin/user/edit",$data);
        $this->load->view("components/footer");
    }

    // Once an article is deleted
    // reload the manage center to show the new list of article
    public function Delete($id){
        $this->load->model('Post');
        $this->Post->deletePost($id);
        redirect('admin/user/loged');
    }
    // create new article under current user's id
    //Part One: show the create page for entering infor
    public function NewArticle(){
        $data['pagename']="Create New Article";
        $data['pagetitle']="Record Your Mind:";
        $this->load->view("components/header",$data);
        $this->load->view("admin/user/newarticle");
        $this->load->view("components/footer");
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-19
 * Time: 3:48 PM
 */ 