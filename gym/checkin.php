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

// Insert new checkin with current datetime, checkout_time NULL
$insert = $pdo->prepare("INSERT INTO checkins (user_id, checkin_time) VALUES (?, NOW())");
if ($insert->execute([$userId])) {
    echo json_encode(['success' => true, 'message' => 'Check-in recorded']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to record check-in']);
}
