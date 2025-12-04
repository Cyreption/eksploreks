<?php

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$recruitments = \App\Models\RecruitmentPost::all();
echo "Total records: " . $recruitments->count() . "\n";
foreach ($recruitments as $r) {
    echo "ID: " . $r->recruitment_id . ", Title: " . $r->title . "\n";
}

// Juga cek apakah ada error di model binding
try {
    $test = \App\Models\RecruitmentPost::find(1);
    if ($test) {
        echo "Found by ID 1: " . $test->title . "\n";
    } else {
        echo "Not found by ID 1\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
