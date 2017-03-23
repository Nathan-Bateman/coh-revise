<?php
header("Content-type: text/javascript");
$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1965235043.f3e333b.e898493cfa6143dda4098fa3192302b9';
//$curl = curl_init($url);
//$result = curl_exec($curl);
//$resultFormatted = json_encode($result,false);
$raw = file_get_contents($url);
$result = json_decode($raw, true, 512, JSON_BIGINT_AS_STRING);
//$reslutFormattedPHP = json_decode($resultFormatted,true);
echo($raw);
 //curl_close($curl);





?>
