<?php

include 'db_connect.php';

$sql= "SELECT * FROM tasks ORDER BY position ASC";
$result=$conn -> query($sql);

$tasks=[];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

$conn->close();
echo json_encode($tasks);
?>
