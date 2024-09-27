<?php
// Database connection
include 'db.php';

$jsonPrizes = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];
    
    // Query to get prizes data from a table
    $stmt = $pdo->query("SELECT id,text,color,reaction FROM options WHERE id = $id");
    $prizes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert the array to JSON
    echo json_encode($prizes);
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>