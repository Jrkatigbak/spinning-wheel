<?php
session_start();
// Database connection
include 'db.php';

$id = $_POST['id'];
$text = $_POST['text'];
$color = $_POST['color'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $deleted_at = date('Y-m-d H:i:s');
    $sql = "UPDATE options SET text = '$text', color = '$color'  WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $_SESSION['flash_message'] = "'Team was successfully updated.','','success'";
    header("location: ../index.php");
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>