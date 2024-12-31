<?php

include "../connection.php";

$userid = filterRequest('id');
$notetitle = filterRequest('title');
$notecontent = filterRequest('content');
$imageName = uploudImage('image');

if ($imageName != 'failed') {
  $stmt = $con->prepare("
INSERT INTO notes (notes_users, notes_title, notes_content , notes_image)
VALUES (?, ?, ?, ?)
");

  $stmt->execute(array($userid, $notetitle, $notecontent, $imageName));

  $count = $stmt->rowCount();

  if ($count > 0) {
    echo json_encode([
      'status' => 'Added successfully',
    ]);
  } else {
    echo json_encode([
      'status' => 'error',
    ]);
  }
}
