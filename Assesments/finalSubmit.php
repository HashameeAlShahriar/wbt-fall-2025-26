<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 

$host = 'localhost';
$db = 'incident_management';
$user = 'root'; 
$pass = ''; 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $priority = $_POST['priority'];

        $stmt = $pdo->prepare("INSERT INTO incidents (title, description, category, priority) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $description, $category, $priority]);

        echo json_encode(['success' => true, 'message' => 'Incident reported successfully!']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>