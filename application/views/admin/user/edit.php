
    <?php
    $attributes=array('id'=>'editting','class'=>'col-md-10 col-md-offset-1');
    echo form_open('site/edit_option',$attributes);
    ?>
    <label class="control-label" for="title">Title: </label>
    <div class="controls">
        <?php
            foreach ($results as $row){
            echo '<input type="checkbx", style="display:none;", name="arti_id", value="'.$row->Arti_ID.'">';
            echo '<input class="form-control" type="text" name="title" placeholder="Please type in the title" value="';
            echo $row->Arti_Title;
            echo '"><br>'
        ?>
    </div>

    <label class="control-label" for="content">Content: </label>

    <div class="controls">
        <?php
        echo '<textarea class="form-control" rows="13" name="content">';
        echo $row->Arti_Content;
        echo '</textarea><br>';
        }
        ?>
    </div>

<!--<div >-->
    <?PHP
    echo '<button style="width: 100%" class="btn btn-primary" name="save" value="Save">'."Save".'</button><br><br>';
    ?>
    <a href="main" style="width: 100%" class="btn btn-success" name="goback" value="Go Back">Return to main page</a>
<!--</div>-->

<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-16
 * Time: 3:36 PM
 */ 