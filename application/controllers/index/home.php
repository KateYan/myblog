<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function Main(){
        $data['pagename']="Main";
        $data['pagetitle']="All Articles:";
        $this->load->view("components/header",$data);
        $this->load->model("model_get");
        $data['results']=$this->model_get->getArticle();
        $this->load->view("index/main",$data);
    }
    public function Articles(){
        $data['pagename']="Articles";
        $data['pagetitle']="The Lost Diomend on the Beach:";
        $this->load->view("components/header",$data);
        $artid=$this->input->get('view');
        $this->load->model("model_get");
        $data['articledetail']=$this->model_get->findArticle($artid);
        $this->load->view("index/articles",$data);
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-19
 * Time: 3:27 PM
 */ 