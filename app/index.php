<?php
$host = "mysql";
$user = "devopsuser";
$password = "devopspass123";
$database = "devops_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS visits (id INT AUTO_INCREMENT PRIMARY KEY, visit_time DATETIME)");
$conn->query("INSERT INTO visits (visit_time) VALUES (NOW())");

$result = $conn->query("SELECT COUNT(*) as total FROM visits");
$row = $result->fetch_assoc();

echo "<h1>DevOps Project - Live!</h1>";
echo "<p>Server: " . gethostname() . "</p>";
echo "<p>Total visits: " . $row['total'] . "</p>";
echo "<p>Current time: " . date("Y-m-d H:i:s") . "</p>";

$conn->close();
?>
