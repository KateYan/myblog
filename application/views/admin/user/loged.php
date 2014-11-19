<div class="col-md-11 col-md-offset-1">
    <h3> All my articles:</h3>
    <div class="col-md-7">
        <?php
        if($results->num_rows()!=0){
            $attributes=array('id'=>'edit');
            echo form_open('admin/user/loged',$attributes);
            echo '<ul class="list-group">';
            foreach($results->result() as $row){
                echo '<li class="list-group-item">';
                echo '<div class="row">';
                echo '<div class="col-md-5" style="width:70% ">';
                echo '<input type="checkbox" style="display:none;"><span>';

                echo anchor('index/home/articles?view='. $row->Arti_ID .'',$row->Arti_Title);
                echo '</span></div>';

                echo '<div class="col-md-2" style="width:30%">';

                echo anchor('admin/article/edit?edit_id='. $row->Arti_ID .'','Edit','class="btn btn-xs btn-primary"');
                echo " ";
                echo anchor('admin/article/delete?delete_id='. $row->Arti_ID .'','Delete','class="btn btn-xs btn-success"');

                echo '</div></div></li>';
            }
            echo '</ul>';
        }
        else {
            echo "You have no article yet.";
        }
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo anchor('admin/article/newarticle','Write a new one','class="btn btn-primary", value="Write a new one"');
        echo br(2);
        echo anchor('index/home/main','Back to main','class="btn btn-success"');
        echo br(2);
        echo anchor('admin/user/logout','Log out','class="btn btn-primary"');
        ?>
    </div>

</div>
<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-16
 * Time: 2:45 PM
 */ 