<?php
$tv = $_REQUEST['id'];

$tokke = 'https://www.vidio.com/live/'.$tv.'/tokens';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $tokke);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'charset: utf-8'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

$result = json_decode($result, true);
$token = isset($result['token']) ? $result['token'] : '';

curl_close($ch);

if ($token) {
    echo "::set-output name=token::$token";
} else {
    echo "::set-output name=token::";
}
?>
