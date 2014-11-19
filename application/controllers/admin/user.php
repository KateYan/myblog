<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends MY_Controller {

    public function index(){

    }

    // For user to login to manage his info and articles
    public function Login(){
        $data['pagename'] = "Log in";
        $data['pagetitle'] = "Please Log in:";
        $this->load->view("components/header", $data);
        $this->load->view("admin/user/login");
        $this->load->view("components/footer");
    }

    // for signup page, create new user
    // and insert his info into table "user"
    // First, Load signup page
    public function Signup(){
        $data['pagename'] = "Sign up";
        $data['pagetitle'] = "Sign up as new user:";
        $this->load->view("components/header", $data);
        $this->load->view("admin/user/signup");
        $this->load->view("components/footer");
    }

    public function Loged(){
        $data['pagename']="Manage Centre";
        $data['pagetitle']="Welcome to your control centre";
        $this->load->view("components/header",$data);
        $this->load->model("model_get");
        $data['results']=$this->model_get->userArticle($_SESSION['userid']);
        $this->load->view("admin/user/loged",$data);
        $this->load->view("components/footer");
    }

    //destroy the sission once user loged out
    public function Logout(){
        $_SESSION=array();

        redirect('index/home/main');
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-19
 * Time: 3:48 PM
 */ 