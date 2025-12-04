<?php

require 'bootstrap/app.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make('Illuminate\Contracts\Http\Kernel');
$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
);

// Create request untuk /recruitment
$testRequest = \Illuminate\Http\Request::create('/recruitment', 'GET');
$testResponse = $kernel->handle($testRequest);

echo "Status: " . $testResponse->getStatusCode() . "\n";
echo "Content: " . substr($testResponse->getContent(), 0, 500) . "\n";

if ($testResponse->getStatusCode() === 500) {
    // Tampilkan error
    $content = $testResponse->getContent();
    if (strpos($content, 'error') !== false) {
        echo "Error found in response\n";
        preg_match('/>(.*?)<\/h2/s', $content, $matches);
        if (isset($matches[1])) {
            echo "Error message: " . trim($matches[1]) . "\n";
        }
    }
}
?>
