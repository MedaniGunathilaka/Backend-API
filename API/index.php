<?php
    $link='http://localhost/rest/api/get.php';
    $json=file_get_contents($link);
    $data=json_decode($json,true);
    var_dump($data);
?>