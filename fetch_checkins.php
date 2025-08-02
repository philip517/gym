<?php
require 'config.php'; // Connect to database

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username'])) {
    echo json_encode(['success' => false, 'message' => 'Username required']);
    exit;
}

$username = $data['username'];

// Get user ID
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    echo json_encode(['success' => false, 'message' => 'User not found']);
    exit;
}

$user_id = $user['id'];

// Fetch check-ins
$stmt = $pdo->prepare("SELECT checkin_time, checkout_time FROM checkins WHERE user_id = ? ORDER BY checkin_time DESC");
$stmt->execute([$user_id]);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'success' => true,
    'data' => $records
]);
