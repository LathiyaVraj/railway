<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $train = $_POST['train'];

    $insert_res = $config->insert($name, $age, $email, $departure, $arrival, $train);

    if ($insert_res) {
        $res['msg'] = "Successfully inserted";
    } else {
        $res['msg'] = "Insertion failed";
    }
} else {
    $res['msg'] = "Only POST request is accepted";
}

echo json_encode($res);
?>