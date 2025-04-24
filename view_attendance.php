<?php
$conn = new mysqli("localhost", "root", "", "attendance_system");
$result = $conn->query("SELECT * FROM attendance ORDER BY scan_time DESC");

echo "<h2>📋 Attendance Records</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>IP Address</th><th>Scan Time</th></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['ip_address']}</td><td>{$row['scan_time']}</td></tr>";
}
echo "</table>";
$conn->close();
?>
    