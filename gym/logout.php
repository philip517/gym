<?php
session_start();
require 'config.php';

if (isset($_SESSION['checkin_id'])) {
    $checkinId = $_SESSION['checkin_id'];
    $stmt = $pdo->prepare('UPDATE checkins SET checkout_time = NOW() WHERE id = ?');
    $stmt->execute([$checkinId]);
}

// Clear session
session_unset();
session_destroy();

// Redirect to login
header("Location: login.php");
exit();
