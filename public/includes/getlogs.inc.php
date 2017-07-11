<?php
//getting all dates from database
$query = "SELECT * FROM timelogsapp  ORDER BY date DESC";
$stmt = $con->prepare($query);
$stmt->execute();

//getting pages
$count = $stmt->rowCount();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

//getting offset from which to show pages
$limit = 8;
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

$query = "SELECT * FROM timelogsapp GROUP BY date(date) ORDER BY date DESC";
$stmt = $con->prepare($query);
$stmt->execute();
$dates = $stmt->fetchAll();

$query = "SELECT * FROM timelogsapp  ORDER BY date DESC LIMIT $limit OFFSET $offset";
$stmt = $con->prepare($query);
$stmt->execute();
$records = $stmt->fetchAll();

function getLogs($con, $dates, $records)
{
    $newArray = [];
    foreach ($dates as $date) {
        $tempArray = [];
        foreach ($records as $record) {
            if (date('Y-m-d', strtotime($date['date'])) == date('Y-m-d', strtotime($record['date']))) {
                array_push($tempArray, $record);
            }
        }
        if (count($tempArray) > 0) {
            array_push($newArray, $tempArray);
        }
    }
    for ($i = 0; $i < count($newArray); $i++) {
        echo '<table class="list-table">';
        echo '<thead>';
        echo '<span class="date">';
        echo datetime($newArray[$i][0]['date']);
        echo '</span>';
        echo '<tr>';
        echo '<th>Description</th>';
        echo '<th>Time</th>';
        echo '<th>Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($newArray[$i] as $value) {
            echo '<tr>';
            echo '<td>'.$value['description'].'</td>';
            echo '<td>'.$value['time'].'</td>';
            echo '<td>'.date('d.m.Y H:i', strtotime($value['date'])).'</td>';
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
