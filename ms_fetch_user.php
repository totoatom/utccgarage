<?php

include('dbcon.php');

session_start();

// $query = "
// SELECT * FROM db_user
// WHERE ID != '".$_SESSION['id']."'
// ";

$query = "
SELECT db_user.ID, db_user.name, db_user.phone, queue.Queue_problem_car, queue.Queue_plate_car FROM db_user
INNER JOIN queue ON db_user.ID = queue.ID_user
WHERE ID != '".$_SESSION['id']."'
";
print_r($_SESSION['id']);
$statement = $conn->prepare($query);

$statement->execute();

$resultSet = $statement->get_result();
// print_r($resultSet);

// $result = $statement->fetchAll();
$result = $resultSet->fetch_all();
// print_r($result);

$output = '
<table class="table table-reflow table-bordered">
<thead class="bg-dark align-middle" style="color:white">
    <tr>
        <td>ชื่อลูกค้า</td>
        <td>หมายเลขติดต่อ</td>
        <td>อาการรถ</td>
        <td>ทะเบียนรถ</td>
        <td>สถานะ</td>
        <td>สนทนา</td>
    </tr>
';
foreach($result as $row)
{
    $status = '';
    $current_timestamp = strtotime(date('Y-m-d H:i:s').'-10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row[0], $conn);
    // print_r($user_last_activity);
    // print_r($current_timestamp);
    if($user_last_activity > $current_timestamp)
    {
        // print_r("Online");
        // $status = '<span class="label label-success">Online</span>';
        $status = '<button class="btn btn-success btn-xs start_chat">Online</button>';
    }
    else
    {
        // print_r("Offline");
        // $status = '<span class="label label-danger">Offline</span>';
        $status = '<button class="btn btn-danger btn-xs start_chat">Offline</button>';
    }
    $output .= '
    <tr>
        <td>'.$row[1].'</td>
        <td>'.$row[2].'</td>
        <td>'.$row[3].'</td>
        <td>'.$row[4].'</td>
        <td>'.$status.'</td>
        <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row[0].' "data-tousername="'.$row[1].'">Start Chat</button></td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;


// <td>'.$row[1].' '.count_unseen_message($row[0], $_SESSION['id'], $conn).'</td>
?>