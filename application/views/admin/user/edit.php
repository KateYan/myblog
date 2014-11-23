
    <?php
    $attributes=array('id'=>'editting','class'=>'col-md-10 col-md-offset-1');
    echo form_open('formcontrol/edit_save',$attributes);
    ?>
    <label class="control-label" for="title">Title: </label>
    <div class="controls">
        <?php
            echo '<input type="checkbx", style="display:none;", name="aid", value="'.$edit->aid.'">';
            echo '<input class="form-control" type="text" name="title" placeholder="Please type in the title" value="';
            echo $edit->title;
            echo '"><br>'
        ?>
    </div>

    <label class="control-label" for="content">Content: </label>

    <div class="controls">
        <textarea class="form-control" rows="13" name="content">
        <?php
        echo $edit->content;
        ?>
        </textarea><br>
    </div>

<!--<div >-->
    <?PHP
    echo '<button style="width: 100%" class="btn btn-primary" name="save" value="Save">'."Save".'</button>';
    echo br(2);
    echo anchor('index/home/main','Return to main','class="btn btn-success" name="goback" value="Go Back"');
    ?>
<!--</div>-->

<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-16
 * Time: 3:36 PM
 */ 