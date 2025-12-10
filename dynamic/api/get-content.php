<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/db.php'; // Adjust path as needed

try {
    $stmt = $conn->prepare("
        SELECT section_name, field_name, content 
        FROM sections 
        WHERE is_visible = 1 
        ORDER BY section_name, display_order
    ");
    $stmt->execute();
    $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($sections);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>