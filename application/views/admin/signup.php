<div class="col-md-8 col-md-offset-2">
    <?php
    $attributes=array('id'=>'signup');
    echo form_open('signup',$attributes);
    ?>
        <label class="control-label" for="username">Username:</label>
            <input class="form-control" type="text" name="username" placeholder="Set your username">
        <label class="control-label" for="email">Email:</label>
            <input  class="form-control" type="text" name="email" placeholder="Enter your email">
        <label class="control-label" for="upasw">Password:</label>
            <input  class="form-control" type="password" name="upasw" placeholder="Set your password"><br>
        <a href="loged" class="btn btn-primary" name="sign" value="save">Sign up</a>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-16
 * Time: 3:19 PM
 */ 