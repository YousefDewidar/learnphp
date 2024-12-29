<?php

include "../connection.php";

$userid = $_GET['user_id'];

$stmt = $con->prepare("
  SELECT * FROM notes WHERE notes_users = ?
");

$stmt->execute(array($userid));

header('Content-Type: application/json');

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if ($count > 0) {
  echo json_encode([
    'status' => 'success',
    'data' => $data,
  ]);
} else {
  echo json_encode([
    'status' => 'error',
  ]);
}
