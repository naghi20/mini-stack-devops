<?php
echo "<h1>🚀 Sample Web App Running!</h1>\n";

try {
    // Creates or opens a local database file instantly inside the container
    $conn = new PDO("sqlite:/tmp/sample_db.sqlite");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Successfully connected to Local SQL database!\n";
} catch(PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
}
?>
