<?php
session_start();
header('Content-Type: application/json');

// Check authentication
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

require_once __DIR__ . '/../../config/db.php'; // Adjust path as needed

// Get JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['section_name']) || !isset($data['field_name']) || !isset($data['content'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    exit;
}

try {
    $section = $data['section_name'];
    $field = $data['field_name'];
    $content = $data['content'];
    
    // Check if entry exists
    $checkStmt = $conn->prepare("
        SELECT id FROM sections 
        WHERE section_name = :section AND field_name = :field
    ");
    $checkStmt->execute([':section' => $section, ':field' => $field]);
    
    if ($checkStmt->rowCount() > 0) {
        // Update existing
        $stmt = $conn->prepare("
            UPDATE sections 
            SET content = :content, updated_at = NOW() 
            WHERE section_name = :section AND field_name = :field
        ");
    } else {
        // Insert new
        $stmt = $conn->prepare("
            INSERT INTO sections (section_name, field_name, content) 
            VALUES (:section, :field, :content)
        ");
    }
    
    $stmt->execute([
        ':section' => $section,
        ':field' => $field,
        ':content' => $content
    ]);
    
    echo json_encode(['success' => true, 'message' => 'Content updated successfully']);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
?>