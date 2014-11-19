<div class="col-md-10 col-md-offset-1">
    <div style="height:100px">

        <h2 class="modal-header">
        <?php
        foreach ($articledetail as $row)
        {
             echo $row->Arti_Title;
             echo '</h2><br><p>';
            echo $row->Arti_Content.'</p>';
         }
        ?>
            <a href="main" class="btn btn-primary" name="return" value="return">Return</a>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: cecil_000
 * Date: 2014-11-14
 * Time: 8:41 PM
 */ 