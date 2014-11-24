<div class="row">
    <?php
    $attributes=array('class'=>'col-md-10 col-md-offset-1','id'=>'newedit');
    echo form_open('formcontrol/newarticle_save',$attributes);
    ?>
        <label class="control-label" for="title">Title: </label>
        <div class="controls">
            <input class="form-control" type="text" name="title" placeholder="Please type in the title"><br>
        </div>

        <label class="control-label" for="content">Content: </label>
        <div class="controls">
            <textarea class="form-control" rows="13" name="content"></textarea><br>
        </div>
        <button style="width: 100%" class="btn btn-primary" name="save" value="Save">Save</button><br><br>
    <a href="../../index/home/main" style="width: 100%" class="btn btn-success" name="goback" value="Go Back">Return to main page</a>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-15
 * Time: 9:36 AM
 */ 