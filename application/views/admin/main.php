<div class="col-md-7 col-md-offset-1">
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
        echo '<a class="btn btn-success" href="login" value="login">'."Log in to manage".'</a>';
    }
    else {
        echo '<a class="btn btn-success" href="newarticle" value="newarticle">'."Write a new one".'</a>';
        echo '<br><br>';
        echo '<a class="btn btn-primary" href="loged" value="manage center">'."Manage Center".'</a>';
    }
    ?>
</div>
