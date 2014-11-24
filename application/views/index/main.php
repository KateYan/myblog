<div class="col-md-7 col-md-offset-1">
    <ul class="list-group">
        <?php
        foreach($postall as $article){
            echo '<li class="list-group-item">';
            echo '<div class="row">';
            echo '<div class="col-md-6" style="width:80% ">';
            echo '<input type="checkbox" style="display:none;">';
            echo '<span>';
            echo '<a href="articles/' . $article->aid . '"><span>';
            echo $article->title;
            echo '</span></a>';
            echo '</span>';
            echo '</div>';

            echo '<div class="col-md-1" style="width:20%">';
            echo '<span style="float:right">';
            echo '<a href="">' . "editor". '</a>';
            echo '</span>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
        }
        ?>
    </ul>
</div>
<div class="col-md-4">
    <?php
    if(!isset($_SESSION['userid'])){
        echo anchor('admin/usercontrol/login','Log in to manage','class="btn btn-success", value="login"');
//        echo '<a class="btn btn-success" href="login" value="login">'."Log in to manage".'</a>';
    }
    else {
        echo anchor('admin/article/newarticle','Write a new one','class="btn btn-success", value="newarticle"');
        echo br(2);
        echo anchor('admin/usercontrol/loged','Manage Center','class="btn btn-primary", value="manage center"');
    }
    ?>
</div>
