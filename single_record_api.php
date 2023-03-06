<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $result = $config->fetch_single_record($id);

    $record = mysqli_fetch_assoc($result);

    if ($record) {
        http_response_code(200);
        $res['data'] = $record;
    } else {
        $res['data'] = "Record not found";
    }


} else {
    $res['msg'] = "Only POST request is accepted";
}

echo json_encode($res);
?>