<?php
session_start();
require 'config.php'; // DB connection

if (!isset($_SESSION['username'], $_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$message = '';

// Handle Check In
if (isset($_POST['checkin'])) {
    // Ensure there's no open session
    $stmt = $pdo->prepare("SELECT id FROM checkins WHERE user_id = ? AND checkout_time IS NULL");
    $stmt->execute([$user_id]);
    $open = $stmt->fetch();

    if (!$open) {
        $insert = $pdo->prepare("INSERT INTO checkins (user_id, checkin_time) VALUES (?, NOW())");
        $insert->execute([$user_id]);
        $message = "Checked in at " . date("H:i:s");
    } else {
        $message = "You are already checked in!";
    }
}

// Handle Check Out
if (isset($_POST['checkout'])) {
    // Get open session
    $stmt = $pdo->prepare("SELECT id FROM checkins WHERE user_id = ? AND checkout_time IS NULL");
    $stmt->execute([$user_id]);
    $open = $stmt->fetch();

    if ($open) {
        $update = $pdo->prepare("UPDATE checkins SET checkout_time = NOW() WHERE id = ?");
        $update->execute([$open['id']]);
        $message = "Checked out at " . date("H:i:s");
    } else {
        $message = "No active check-in found.";
    }
}

// Fetch all sessions
$stmt = $pdo->prepare("SELECT checkin_time, checkout_time FROM checkins WHERE user_id = ? ORDER BY checkin_time DESC");
$stmt->execute([$user_id]);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta http-equiv="refresh" content="3"> -->

    <meta charset="UTF-8">
    <title>Home Page</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background: #e0f7fa;
            padding: 20px;
        }
         .button {
        padding: 10px 25px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        color: white;
        transition: background-color 0.3s ease;
        margin: 5px;
    }
    .checkin-button {
        background-color: #42a5f5;
    }
    .checkin-button:hover {
        background-color: #1e88e5;
    }
    .checkout-button {
        background-color: #66bb6a;
    }
    .checkout-button:hover {
        background-color: #43a047;
    }
    .logout-button {
        margin-top: 20px;
        background: #f44336;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }
    .logout-button:hover {
        background: #d32f2f;
    }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background: #b2ebf2;
        }
        .buttons form {
            display: inline-block;
            margin: 10px;
        }
        .message {
            margin-top: 15px;
            color: green;
            font-weight: bold;
        }
        .logout-button {
            margin-top: 20px;
            background: #f44336;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
        }
    </style>
    <!-- hajsgda -->
</head>
<body>
<div class="container">
    <h1>Welcome, <?= htmlspecialchars($username) ?>!</h1>

    <div class="buttons">
    <form method="post" style="display:inline;">
        <button type="submit" name="checkin" class="button checkin-button">Check In</button>
    </form>
    <form method="post" style="display:inline;">
        <button type="submit" name="checkout" class="button checkout-button">Check Out</button>
    </form>
</div>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <h2>Your Sessions</h2>
    <?php if (!empty($records)): ?>
        <table>
            <tr>
                <th>#</th>
                <th>Check In Time</th>
                <th>Check Out Time</th>
            </tr>
            <?php foreach ($records as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['checkin_time']) ?></td>
                    <td><?= $row['checkout_time'] ? htmlspecialchars($row['checkout_time']) : '—' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No check-ins found.</p>
    <?php endif; ?>

    <a href="logout.php" class="logout-button">Log Out</a>
</div>
</body>
</html>
