<div class="col-md-11 col-md-offset-1">
    <h3> All my articles:</h3>
    <div class="col-md-7">
        <?php
        $attributes=array('id'=>'edit');
        echo form_open('site/loged',$attributes);
        ?>
        <ul class="list-group">
        <?php
        foreach($results as $row){
            echo '<li class="list-group-item">';
            echo '<div class="row">';
            echo '<div class="col-md-6" style="width:80% ">';
            echo '<input type="checkbox" style="display:none;">';
            echo '<span>';
            echo '<a href="articles?view=' . $row->Arti_ID . '"><span>';
            echo $row->Arti_Title;
            echo '</span></a>';
            echo '</span>';
            echo '</div>';

            echo '<div class="col-md-1" style="width:20%">';
            echo '<span style="float:right">';
            echo '<a href="edit?edit_id='.$row->Arti_ID.'" class="btn btn-xs btn-primary">' . "edit ". '</a>'." ";
            echo '<a href="loged_delete?delete_id='.$row->Arti_ID.'" class="btn btn-xs btn-success">' . "delete ". '</a>';
            echo '</span>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
        }
        ?>
        </ul>
    </div>
    <div class="col-md-4">
        <a href="newarticle" class="btn btn-primary" value="Write a new one">Write a new one</a><br><br>
        <a href="main" class="btn btn-success" >Back to main</a><br><br>
        <a href="logout" class="btn btn-primary" name="logout">Log out</a>
    </div>

</div>
<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-16
 * Time: 2:45 PM
 */ 