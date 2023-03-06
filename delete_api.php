<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    parse_str(file_get_contents('php://input'), $_DELETE);

    $deleted_res = $config->delete($_DELETE['id']);

    http_response_code(200);

    if ($deleted_res) {
        $res['msg'] = "Successfully Deleted";
    } else {
        $res['msg'] = "Delete Failed";
    }
} else {
    $res['msg'] = "Only DELETE request is accepted";
}

echo json_encode($res);
?>