<?php
include('../public/includes/dbh.inc.php');
include('../public/includes/getlogs.inc.php');


 getLogs($con,  $dates, $records); //generating logs table
 ?>
 <div class="pagination cf">
   <?php echo $link; //printing out paginator?>
 </div>
