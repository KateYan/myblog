<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

    class Formcontrol extends MY_Controller
    {
        //math user's username and password to login
        // and create session data at the same time
        public function Login_confirm()
        {

            if (null == $this->input->post('username')) {
                echo "Please enter your username!";
            } elseif (null == $this->input->post('password')) {
                echo "Please enter your password!";
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $this->load->model("model_get");
                $num = $this->model_get->logIn_match($username, $password);
                if ($num != 0) {
                    $results = $this->model_get->logIn_user($username, $password);
                    foreach ($results as $row) {
                        $_SESSION['userid'] = $row->UserID;
                        $_SESSION['username'] = $row->UserName;

                        redirect('admin/user/loged');
                    }
                } else {
                    echo "Your username and password don't match!";
                }
            }
        }


        //after user loged in to edit his existing article
        public function Edit_save(){

            $title=$this->input->post('title');
            $content=$this->input->post('content');
            $arti_id=$this->input->post('arti_id');

            $this->load->model("model_get");
            $this->model_get->updateArticle($title,$content,$arti_id);

            redirect('admin/user/loged');
        }

        //save new article
        public function Newarticle_save(){
            $title=$this->input->post('title');
            $content=$this->input->post('content');
            $this->load->model("model_get");
            $this->model_get->saveArticle($title,$content,$_SESSION['userid']);

            redirect('admin/user/loged');
        }

        //check info befor create a new user account
        public function Signup_confirm(){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $this->load->model("model_get");
            $name_num = $this->model_get->nameCheck($username);
            $email_num = $this->model_get->emailCheck($email);
            if ($name_num != 0) {
                echo "This username has been taken.";
            } elseif ($email_num != 0) {
                echo "This email address has been used to register.";
            } else {
                $upasw = $this->input->post('upasw');
                $this->load->model('model_get');
                $userid = $this->model_get->newUser($username, $email, $upasw);
                $_SESSION['userid'] = $userid;

                redirect('admin/user/loged');
            }
        }
    }
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-19
 * Time: 12:06 AM
 */ 