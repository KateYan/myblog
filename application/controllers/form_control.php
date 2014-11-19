<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');

    class Form_control extends MY_Controller {

        function __construct()
        {
            parent::__construct();
        }
        public function index() {

        }

        public function Login_confirm(){

            echo "Hi";

//            if(null==$this->input->post('username')){
//                echo "Please enter your username!";
//            }
//            elseif(null==$this->input->post('password')){
//                echo "Please enter your password!";
//            }
//            else {
//                $username = $this->input->post('username');
//                $password = $this->input->post('password');
//                $this->load->model("model_get");
//                $num=$this->model_get->logIn_match($username, $password);
//                if($num!=0){
//                    $results=$this->model_get->logIn_user($username, $password);
//                    foreach($results as $row){
//                        $_SESSION['userid'] = $row->UserID;
//                        $_SESSION['username'] = $row->UserName;
//
//                        redirect('site/loged');
//                    }
//                }
//                else {
//                    echo "Your username and password don't match!";
//                }
//            }
        }
    }
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-19
 * Time: 12:06 AM
 */ 