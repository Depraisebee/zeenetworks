<?php
require 'vendor/autoload.php';

$headers = [
    'Accept' => '*/*',
    'X-Country' => 'UG',
    'X-Currency' => 'UGX',
    'Authorization' => 'Bearer UC*****2w',
];

$client = new GuzzleHttp\Client();

try {
    $response = $client->request('GET', 'https://openapiuat.airtel.africa/standard/v1/cashin/{id}', [
        'headers' => $headers,
    ]);

    print_r($response->getBody()->getContents());
} catch (GuzzleHttp\Exception\RequestException $e) {
    // Handle exception or API errors.
    print_r($e->getMessage());
}
?>
