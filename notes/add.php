<?php

include "../connection.php";

$userid = filterRequest('id');
$notetitle = filterRequest('title');
$notecontent = filterRequest('content');

$stmt = $con->prepare("
  INSERT INTO notes (notes_users, notes_title, notes_content)
  VALUES (?, ?, ?)
");

$stmt->execute(array($userid, $notetitle, $notecontent));

$count = $stmt->rowCount();

if ($count > 0) {
  echo json_encode([
    'status' => 'success',
  ]);
} else {
  echo json_encode([
    'status' => 'error',
  ]);
}
