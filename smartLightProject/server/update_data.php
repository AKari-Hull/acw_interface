<?php
$id = $_POST['id'];
$status = $_POST['status'];

error_log("id: $id, status: $status");

$file_path = "./data/connect_data.csv";

$data = file_get_contents($file_path);

$data_array = explode("\n", $data);

foreach ($data_array as &$row) {
    $row_array = str_getcsv($row);
    if ($row_array[0] === $id) {
        $row_array[1] = $status;
        $row = implode(",", $row_array);
        break;
    }
}

file_put_contents($file_path, implode("\n", $data_array));

echo implode("\n", $data_array);
?>
