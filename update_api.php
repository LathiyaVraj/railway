<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT , PATCH');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PATCH' || $_SERVER['REQUEST_METHOD'] == 'PUT') {

    parse_str(file_get_contents("php://input"), $_PUT_PATCH);

    $name = $_PUT_PATCH['name'];
    $age = $_PUT_PATCH['age'];
    $email = $_PUT_PATCH['email'];
    $departure = $_PUT_PATCH['departure'];
    $arrival = $_PUT_PATCH['arrival'];
    $train = $_PUT_PATCH['train'];
    $id = $_PUT_PATCH['id'];

    $update_res = $config->update($name, $age, $email, $departure, $arrival, $train, $id);

    if ($update_res) {
        $res['msg'] = "Edited Successfully";
    } else {
        $res['msg'] = "Edit Failed";
    }


} else {
    $res['msg'] = "Only PUT/PATCH request is accepted";
}

echo json_encode($res);
?>