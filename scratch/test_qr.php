<?php
require 'vendor/autoload.php';
use Endroid\QrCode\Builder\Builder;

try {
    $result = Builder::create()
        ->data('test')
        ->size(300)
        ->margin(10)
        ->build();
    echo "Success: " . $result->getDataUri() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
