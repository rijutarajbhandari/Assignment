<?php
include "db_Connect.php";

$sql = "SELECT * FROM posts";
$result=$conn -> query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='post'>
            <img src='{$row['icon']}' alt='Icon'>
            <h3>{$row['title']}</h3>
            <p>{$row['description']}</p>
        </div>";
    }
}else{
    echo "<p> No posts available. </p>";
}

$conn -> close();
?>
