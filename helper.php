<?php

function filterRequest($requestName)
{

  return htmlspecialchars(strip_tags($_POST[$requestName]));
}


function uploudImage($imageRequestName)
{
  define('MB', 1048576);
  $imageName = $_FILES[$imageRequestName]['name'];
  $tmpName = $_FILES[$imageRequestName]['tmp_name'];
  $imageSize = $_FILES[$imageRequestName]['size'];
  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  $splitedFileName = explode('.', $imageName);
  $ext = strtolower(end($splitedFileName));

  if (empty($imageName)) {
    echo  json_encode([
      'status' => 'failed',
      'message' => "Please upload an image",
    ]);
    return "failed";
  } elseif (!in_array($ext, $allowedExtensions)) {
    echo  json_encode([
      'status' => 'failed',
      'message' => 'File extensions is not allowed',
    ]);
    return "failed";
  } else if ($imageSize > 2 * MB) {
    echo  json_encode([
      'status' => 'failed',
      'message' => 'The file size is greater than 2MB',
    ]);
    return "failed";
  } else {
    $imageName = uniqid() . $imageName;
    move_uploaded_file($tmpName, "../uploads/$imageName");
    // echo json_encode([
    //   'status' => 'success',
    //   'message' => 'File uploaded successfully',
    // ]);
    return $imageName;
  }
}
