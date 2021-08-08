<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../class/text_print.class.php';

$items = new TextPrint();

$stmt = $items->getTextPrint();
$itemCount = $stmt->rowCount();

if ($itemCount > 0) {

    $textArr = array();
    $textArr["body"] = array();
    $textArr["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id"    => $id,
            "letra" => $letra,
            "texto" => $texto,
            "fecha" => $fecha
        );

        array_push($textArr["body"], $e);
    }
    echo json_encode($textArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
