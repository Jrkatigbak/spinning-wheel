<?php
// Database connection
include 'db.php';

$id = $_GET['id'];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $deleted_at = date('Y-m-d H:i:s');
    $sql = "UPDATE options SET deleted_at = '$deleted_at'  WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>