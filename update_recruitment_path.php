<?php

$host = '127.0.0.1';
$db = 'db_eksploreks';
$user = 'postgres';
$password = 'izhan6';
$port = 5433;

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Update path gambar dari recruitment/ ke uploads/recruitment/
    $sql = "UPDATE recruitment_posts SET image = REPLACE(image, 'recruitment/', 'uploads/recruitment/') WHERE image LIKE 'recruitment/%'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    echo "✓ Path gambar sudah diupdate di database\n";
    
    // Verify
    $result = $pdo->query('SELECT recruitment_id, title, image FROM recruitment_posts');
    echo "\nData yang tersimpan:\n";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['recruitment_id'] . ", Title: " . $row['title'] . ", Image: " . $row['image'] . "\n";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
