<?php
include 'db_connect.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error); // Debugging error message
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<pre>"; print_r($row); echo "</pre>"; // Debug output
    }
} else {
    echo "No posts available.";
}
?>
