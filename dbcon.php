<?php
$db_host = "localhost";
$db_name = "utccgarage";
$db_user = "root";
$db_pass = "";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function fetch_user_last_activity($user_id, $conn)
{
    $query = "
    SELECT * FROM login_details
    WHERE user_id = '$user_id'
    ORDER BY last_activity DESC
    LIMIT 1
    ";
    $statement = $conn->prepare($query);
    $statement->execute();
    // $result = $statement->fetchAll();
    $resultSet = $statement->get_result();
    $result = $resultSet->fetch_all();
    // print_r($result);
    foreach($result as $row)
    {
        return $row[2];
    }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $conn)
{
    $query = "
    SELECT * FROM chat_message
    WHERE (from_user_id = '".$from_user_id."'
    AND to_user_id = '".$to_user_id."')
    OR (from_user_id = '".$to_user_id."'
    AND to_user_id = '".$from_user_id."')
    ORDER BY timestamp DESC
    ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '<ul class="list-unstyled">';
    foreach($result as $row)
    {
        $user_name = '';
        if($row["from_user_id"] == $from_user_id)
        {
            $user_name = '<b class="text-success">You</b>';
        }
        else
        {
            $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc">
            <p>'.$user_name.' - '.row["chat_message"].'
                <div align="right">
                    - <small><em>'.row['timestamp'].'</em></small>
                </div>
            </p>
        </li>
        ';
    }
    $output .= '</ul>';
    $query = "
    UPDATE chat_message
    SET status = '0'
    WHERE from_user_id = '".$to_user_id."'
    AND to_user_id = '".$from_user_id."'
    AND status = '1'
    ";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $output;
}

function get_user_name($user_id, $conn)
{
    $query = "SELECT name FROM db_user WHERE ID = '$user_id'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        return $row['name'];
    }
}

function count_unseen_message($from_user_id, $to_user_id, $conn)
{
    $query = "
    SELECT * FROM chat_message
    WHERE from_user_id = '$from_user_id'
    AND to_user_id = '$to_user_id'
    AND status = '1'
    ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    print_r($count);
    $output = '';
    if($count > 0)
    {
        $output = '<span class="label label-success">'.$count.'</span>';
    }
    return $output;
}
?>