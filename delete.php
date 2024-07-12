<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM articles WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index_admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
