<?php
  include('../includes/dbh.inc.php');
setLogs($con);

//saving records to database
function setLogs($con)
{
    if (isset($_POST['timeLogsSubmit'])) { //if button timeLogsSubmit is pressed
    $description = $_POST['description'];
        $time = $_POST['time'];
        $date = $_POST['date'];

        if (!empty($description)) { //if description input field is not empty, insert records to database.
      try {
          $stmt = $con->prepare("INSERT INTO timelogsapp (description, time, date) VALUES (:description, :time, NOW())");
          $stmt->execute(array(':description'=>$description, ':time'=>$time));
      } catch (PDOException $ex) {
          echo $ex->getMessage();
      }
        } else {
            echo "Input description";
        }
    }
}
