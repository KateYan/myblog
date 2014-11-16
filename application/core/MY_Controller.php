<?php
class MY_Controller extends CI_Controller{
public function __construct()
{
parent::__construct();
}

public function is_logged_in()
{
$user = $this->session->userdata('user_data');
return isset($user);
}
}
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-16
 * Time: 2:33 PM
 */ 