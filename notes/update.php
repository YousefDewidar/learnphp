<?php

include "../connection.php";

$noteid = filterRequest('note_id');
$notetitle = filterRequest('title');
$notecontent = filterRequest('content');

$stmt = $con->prepare("
  UPDATE notes
  SET notes_title = ?, notes_content = ?
  WHERE notes_id = ?
");

$stmt->execute(array($notetitle, $notecontent, $noteid));

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
