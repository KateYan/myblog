<div class="col-md-8 col-md-offset-2">
    <?php
    $attributes=array('id'=>'logininfo');
    echo form_open('formcontrol/Login_confirm',$attributes);
    ?>
    <label class="control-label" for="username">Username:</label>
        <input form="logininfo" class="form-control" type="text" name="username" placeholder="Enter your username">
    <label class="control-label" for="password">Password</label>
        <input form="logininfo" class="form-control" type="password" name="password" placeholder="Enter your password"><br>

    <button class="btn btn-primary" name="inconfirm">Log in</button>
    <?php
    echo anchor('index/home/main','Return ','class="btn btn-success", value="return to main"');
    echo " ";
    echo anchor('admin/user/signup','Sign up','class="btn btn-primary", value="signup"');
    ?>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-15
 * Time: 4:44 PM
 */ 