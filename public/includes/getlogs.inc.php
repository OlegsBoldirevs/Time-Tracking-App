<?php
//getting all dates from database
$query = "SELECT * FROM timelogsapp GROUP BY date(date) ORDER BY date DESC";
$stmt = $con->prepare($query);
$stmt->execute();
$all_dates = $stmt->fetchAll();

//getting pages
$count = $stmt->rowCount();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

//getting offset from which to show pages
$limit = 3;
$offset = ($page -1) * $limit;
//counting pages
$pages = ceil($count / $limit);
$link = '';

//creating variable with paginator buttons. Checking if page is selected and adding active class to it.
if ($pages > 1) {
    for ($i = 1; $i <= $pages; $i++) {
        $link.= "<a class='pages ".($page == $i ? 'active' : '')."' onClick='displayFromDatabase($i)'>".$i."</a>";
    }
}

// getting all dates from database with limit
$all_dates_query = "SELECT * FROM timelogsapp GROUP BY date(date) ORDER BY date DESC LIMIT $limit OFFSET $offset";
$stmt = $con->prepare($all_dates_query);
$stmt->execute();
$all_dates = $stmt->fetchAll();

function getLogs($con, $all_dates)
{
    foreach ($all_dates as $row) {
        $this_date = $row['date'];
        $all_dates = "SELECT * FROM timelogsapp WHERE date(date) = date('$this_date') ORDER BY date DESC"; //getting all logs for current date
        $stmt = $con->prepare($all_dates);
        $stmt->execute();
        $result = $stmt->fetchAll();
        //generating html table with logs
        echo '<table class="list-table">';
        echo '<thead>';
        echo '<span class="date">';
        echo datetime($this_date);
        echo '</span>';
        echo '<tr>';
        echo '<th>Description</th>';
        echo '<th>Time</th>';
        echo '<th>Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['time'].'</td>';
            echo '<td>'.date('d.m.Y H:i', strtotime($row['date'])).'</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}
// function to print out date
function datetime($this_date)
{
    if (date('Y-m-d', strtotime($this_date)) == date('Y-m-d')) {
        echo 'Today';
    } else {
        echo date('d.m.Y', strtotime($this_date));
    }
}
