<?php
$host = 'local-db';
$user = 'root';
$pass = 'rootpassword';
$db   = 'sample_db';

echo "<h1>🚀 Sample Web App Running!</h1>\n";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Successfully connected to MariaDB SQL database!\n";
} catch(PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
}
?>
