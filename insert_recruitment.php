<?php

$host = '127.0.0.1';
$db = 'db_eksploreks';
$user = 'postgres';
$password = 'izhan6';
$port = 5433;

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = [
        [
            'title' => 'Open Recruitment GD',
            'description' => 'Kami sedang mencari Graphic Designer berbakat untuk bergabung bersama tim kreatif kami. Kalian akan bertugas membuat poster, feed Instagram, thumbnail YouTube, dan berbagai konten visual lainnya.',
            'organization' => 'Divisi Kreatif',
            'location' => 'Surabaya',
            'deadline' => '2025-01-15',
            'application_link' => 'https://forms.gle/contoh-gd',
            'file_link' => null,
            'image' => 'recruitment/GD-recruitment.jpg',
        ],
        [
            'title' => 'Open Recruitment MS',
            'description' => 'Dicari talenta muda yang aktif dan kreatif untuk mengelola akun media sosial resmi kampus. Tugas utama: membuat konten harian, story, reels, dan berinteraksi dengan followers.',
            'organization' => 'Biro Humas',
            'location' => 'Online',
            'deadline' => '2025-01-20',
            'application_link' => 'https://forms.gle/contoh-ms',
            'file_link' => null,
            'image' => 'recruitment/MS-recruitment.png',
        ],
    ];

    $sql = 'INSERT INTO recruitment_posts (title, description, organization, location, deadline, application_link, file_link, image, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())';
    $stmt = $pdo->prepare($sql);

    foreach ($data as $row) {
        $stmt->execute([
            $row['title'],
            $row['description'],
            $row['organization'],
            $row['location'],
            $row['deadline'],
            $row['application_link'],
            $row['file_link'],
            $row['image'],
        ]);
    }

    echo "✓ Data berhasil dimasukkan ke recruitment_posts\n";

    $result = $pdo->query('SELECT * FROM recruitment_posts');
    echo "Total record: " . $result->rowCount() . "\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
