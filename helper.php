<?php

function filterRequest($requestName)
{

  return htmlspecialchars(strip_tags($_POST[$requestName]));
}


function uploudImage($imageRequestName)
{
  global $errorMsg;
  define('MB', 1048576);
  $imageName = $_FILES[$imageRequestName]['name'];
  $tmpName = $_FILES[$imageRequestName]['tmp_name'];
  $imageSize = $_FILES[$imageRequestName]['size'];

  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  $splitedFileName = explode('.', $imageName);

  $ext = strtolower(end($splitedFileName));


  if (!empty($imageName) && !in_array($ext, $allowedExtensions)) {
    // The file ext is not allowed
    $errorMsg = "File is not allowed";
  } else if ($imageSize > 2 * MB) {
    // The file size is greater than 2MB
    $errorMsg = "File is too large";
  } else {
    if (empty($errorMsg)) {
      move_uploaded_file($tmpName, "uploads/$imageName");
      print_r("File uploaded successfully");
    } else {
      echo "Error: ";
      print_r($errorMsg);
    }
  }
}
