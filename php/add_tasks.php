<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];

    // Get the highest position value
    $sql = "SELECT MAX(position) AS max_position FROM tasks";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $newPosition = $row['max_position'] + 1;

    $stmt = $conn->prepare("INSERT INTO tasks (task, position) VALUES (?, ?)");
    $stmt->bind_param("si", $task, $newPosition);
    $stmt->execute();
    
    echo json_encode(["success" => true, "id" => $stmt->insert_id]);
    $stmt->close();
}

$conn->close();
?>
