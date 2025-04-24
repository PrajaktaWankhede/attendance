<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "attendance_system";

// DB connection
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ip = $_SERVER['REMOTE_ADDR'];
$now = date('Y-m-d H:i:s');

// Insert attendance
$sql = "INSERT INTO attendance (ip_address, scan_time) VALUES ('$ip', '$now')";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Marked</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0fff0;
        }
        .message {
            background: #d4edda;
            color: #155724;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="message">
        <?php
        if ($conn->query($sql)) {
            echo "✅ Attendance Marked Successfully at <br><strong>$now</strong>";
        } else {
            echo "❌ Error: " . $conn->error;
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
