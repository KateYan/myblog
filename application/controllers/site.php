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

    public function Login()
    {
        $data['pagename'] = "Log in";
        $data['pagetitle'] = "Please Log in:";
        $this->load->view("admin/components/header", $data);
        $this->load->view("admin/user/login");
        $this->load->view("admin/components/footer");
    }
//    public function Login_confirm(){
//        if(null==$this->input->post('username')){
//            echo "Please enter your username!";
//        }
//        elseif(null==$this->input->post('password')){
//            echo "Please enter your password!";
//        }
//        else {
//            $username = $this->input->post('username');
//            $password = $this->input->post('password');
//            $this->load->model("model_get");
//            $num=$this->model_get->logIn_match($username, $password);
//            if($num!=0){
//                $results=$this->model_get->logIn_user($username, $password);
//                foreach($results as $row){
//                    $_SESSION['userid'] = $row->UserID;
//                    $_SESSION['username'] = $row->UserName;
//
//                    $home_url="loged";
//                    header('Location:'.$home_url);
//                }
//            }
//            else {
//                echo "Your username and password don't match!";
//            }
//        }
//    }

    //For loged page which is also the user's control centre page
    //show all the user's article for update and delete
    //also with new article create and logout option
    //First loading the page with all his article
    public function Loged(){
        $data['pagename']="Manage Centre";
        $data['pagetitle']="Welcome to your control centre";
        $this->load->view("admin/components/header",$data);
        $this->load->model("model_get");
        $data['results']=$this->model_get->userArticle($_SESSION['userid']);
        $this->load->view("admin/user/loged",$data);
        $this->load->view("admin/components/footer");
    }

    public function Loged_delete(){
        $arti_id=$this->input->get('delete_id');
        $this->load->model("model_get");
        $this->model_get->deleteArticle($arti_id);

        $home_url="loged";
        header('Location:'.$home_url);

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

    }

    public function Edit_option(){

        $title=$this->input->post('title');
        $content=$this->input->post('content');
        $arti_id=$this->input->post('arti_id');

        $this->load->model("model_get");
        $this->model_get->updateArticle($title,$content,$arti_id);

        $home_url="loged";
        header('Location:'.$home_url);

    }

    public function Logout(){
        $_SESSION=array();

        $home_url="main";
        header('Location:'.$home_url);
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

    // for signup page, create new user
    // and insert his info into table "user"
    // First, Load signup page
    public function Signup(){
        $data['pagename'] = "Sign up";
        $data['pagetitle'] = "Sign up as new user:";
        $this->load->view("admin/components/header", $data);
        $this->load->view("admin/signup");
        $this->load->view("admin/components/footer");
    }

    // Second getting input info to check and insert
    public function Signup_confirm(){
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $this->load->model("model_get");
        $name_num=$this->model_get->nameCheck($username);
        $email_num=$this->model_get->emailCheck($email);
        if($name_num!=0){
            echo "This username has been taken.";
        }
        elseif($email_num!=0){
            echo "This email address has been used to register.";
        }
        else {
            $upasw=$this->input->post('upasw');
            $this->load->model('model_get');
            $userid=$this->model_get->newUser($username,$email,$upasw);
            $_SESSION['userid']=$userid;

            $home_url="loged";
            header('Location:'.$home_url);
        }
    }
}
