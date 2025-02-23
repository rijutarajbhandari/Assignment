<?php
include 'db_connect.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert absolute path to relative
        $icon_path = str_replace("C:/xampp/htdocs/EBPearls/Assignment/", "", $row['icon']);

        echo "<div class='post'>";
        echo "<img src='" . $icon_path . "' alt='Post Icon' style='width:50px; height:50px;'>";
        echo "<h2>{$row['title']}</h2>";
        echo "<p>{$row['desp']}</p>";
        echo "</div>";
    }
} else {
    echo "No posts available.";
}
?>
