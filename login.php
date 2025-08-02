<?php
session_start();
require 'config.php'; // Make sure this file sets up the PDO connection in $pdo

header("Access-Control-Allow-Origin: *"); // Allow cross-origin requests (for mobile app)
header("Content-Type: application/json"); // Default content type to JSON

$error = '';
$username = '';

// Detect if request is JSON (mobile app)
$isJson = isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false;

if ($isJson) {
    // Parse JSON input from mobile app
    $input = json_decode(file_get_contents('php://input'), true);
    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo json_encode(['success' => true, 'message' => 'Login successful']);
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing username or password']);
        exit();
    }
}

// If not JSON, assume regular web form request (POST)
header("Content-Type: text/html; charset=utf-8"); // Override to HTML for browser

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    } else {
        $error = 'Please enter username and password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Check-In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
        }
        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px #aaa;
            width: 350px;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type=text]:focus, input[type=password]:focus {
            border-color: #4285f4;
            outline: none;
            box-shadow: 0 0 5px #4285f4;
        }
        button {
            width: 100%;
            background-color: #4285f4;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #3367d6;
        }
        .error {
            color: #d93025;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Check In</h2>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="login.php" autocomplete="off">
        <input type="text" name="username" placeholder="Username" required value="<?= htmlspecialchars($username) ?>" />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Check In</button>
    </form>
</div>
</body>
</html>
