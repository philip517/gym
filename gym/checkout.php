<?php
require 'config.php'; // Your PDO connection setup

// Read JSON input
$data = json_decode(file_get_contents("php://input"));

if (!isset($data->username)) {
    echo json_encode(['success' => false, 'message' => 'Username required']);
    exit;
}

$username = $data->username;

// Find user id
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['success' => false, 'message' => 'User not found']);
    exit;
}

$userId = $user['id'];

// Update the latest check-in entry with NULL checkout_time to current datetime
$update = $pdo->prepare("UPDATE checkins SET checkout_time = NOW() WHERE user_id = ? AND checkout_time IS NULL ORDER BY checkin_time DESC LIMIT 1");
if ($update->execute([$userId]) && $update->rowCount() > 0) {
    echo json_encode(['success' => true, 'message' => 'Check-out recorded']);
} else {
    echo json_encode(['success' => false, 'message' => 'No active check-in found']);
}
