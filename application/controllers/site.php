<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Site extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }
    public function index() {

	}
    public function Main(){
        $data['pagename']="Main";
        $data['pagetitle']="All Articles:";
        $this->load->view("admin/components/header",$data);
        $this->load->model("model_get");
        $data['results']=$this->model_get->getArticle();
        $this->load->view("admin/main",$data);
    }
//    public function getValues(){
//        $this->load->model("model_get");
//
//        $data['results']=$this->model_get->getData();
//
//        $this->load->view("main",$data);
//    }
    public function Articles(){
        $data['pagename']="Articles";
        $data['pagetitle']="The Lost Diomend on the Beach:";
        $this->load->view("admin/components/header",$data);
        $artid=$this->input->get('view');
        $this->load->model("model_get");
        $data['articledetail']=$this->model_get->findArticle($artid);
        $this->load->view("admin/articles",$data);
    }

    public function Login(){
        $data['pagename'] = "Log in";
        $data['pagetitle'] = "Please Log in:";
        $this->load->view("admin/components/header", $data);
        $this->load->view("admin/user/login");
        if ($this->input->post('inconfirm')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model("model_get");
            $_SESSION['userid'] = $this->model_get->logIn($username, $password);
        }
        $this->load->view("admin/components/footer");
    }


    public function Loged(){
        $data['pagename']="Manage Centre";
        $data['pagetitle']="Welcome to your control centre";
        $this->load->view("admin/components/header",$data);
        $this->load->model("model_get");
        $userid='7';
        $data['results']=$this->model_get->userArticle($userid);
        $this->load->view("admin/user/loged",$data);

        $this->load->view("admin/components/footer");
    }


    public function NewArticle(){
       $data['pagename']="Create New Article";
        $data['pagetitle']="Record Your Mind:";
        $this->load->view("admin/components/header",$data);
        $this->load->view("admin/newarticle");
        if($this->input->post('save')){
            $title=$this->input->post('title');
            $content=$this->input->post('content');
            $userid='2';
            $this->load->model("model_get");
            $this->model_get->saveArticle($title,$content,$userid);
        }

        $this->load->view("admin/components/footer");
    }
    public function Edit(){
        $data['pagename']="Edit Article";
        $data['pagetitle']="Record Your Mind:";
        $this->load->view("admin/components/header",$data);
        $editid=$this->input->get('edit_id');
        $this->load->model("model_get");
        $data['results']=$this->model_get->findArticle($editid);
        $this->load->view("admin/user/edit",$data);
        $this->load->view("admin/components/footer");

        if($this->input->post('save')){

            $title=$this->input->post('title');
            $content=$this->input->post('content');

            $this->load->model("model_get");
            $this->model_get->updateArticle($arti_id,$title,$content);
        }
    }
    public function Signup(){
        $data['pagename']="Sign up";
        $data['pagetitle']="Sign up as new user:";
        $this->load->view("admin/components/header",$data);
        $this->load->view("admin/signup");
        $this->load->view("admin/components/footer");
        if($this->input->post('save')){
            $username=$this->input->post('username');
            $email=$this->input->post('email');
            $upasw=$this->input->post('upasw');
            $this->load->model('model_get');
            $this->model_get->newUser($username,$email,$upasw);
        }
    }



}
