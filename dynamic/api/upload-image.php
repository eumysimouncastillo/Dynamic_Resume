<?php
session_start();
header('Content-Type: application/json');

// Check authentication
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

// Check if file was uploaded
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'No file uploaded or upload error']);
    exit;
}

$file = $_FILES['image'];
$section = $_POST['section'] ?? '';
$field = $_POST['field'] ?? '';

// Validate file type (allow images and GIFs)
$allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
$file_type = mime_content_type($file['tmp_name']);

if (!in_array($file_type, $allowed_types)) {
    echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPG, PNG, GIF, and WebP allowed.']);
    exit;
}

// Validate file size (max 5MB)
$max_size = 5 * 1024 * 1024; // 5MB
if ($file['size'] > $max_size) {
    echo json_encode(['success' => false, 'error' => 'File too large. Max 5MB allowed.']);
    exit;
}

// Generate unique filename
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = $section . '_' . $field . '_' . time() . '_' . uniqid() . '.' . $extension;
$upload_path = __DIR__ . '/../../uploads/' . $filename;

// Create uploads directory if it doesn't exist
if (!file_exists(__DIR__ . '/../../uploads')) {
    mkdir(__DIR__ . '/../../uploads', 0755, true);
}

// Move uploaded file
if (move_uploaded_file($file['tmp_name'], $upload_path)) {
    // Return the relative path for frontend
    $relative_path = 'dynamic_resume/uploads/' . $filename;
    
    // Save to database (you'll need to update your sections table)
    require_once __DIR__ . '/../../config/db.php';
    
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
        ':content' => $relative_path
    ]);
    
    echo json_encode([
        'success' => true,
        'message' => 'Image uploaded successfully',
        'path' => $relative_path,
        'full_url' => '/' . $relative_path
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to upload file']);
}
?>