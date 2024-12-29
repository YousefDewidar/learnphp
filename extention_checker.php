<?php

$fileName = "yousef.jpg";

// Split the file name into an array
$splitedFileName = explode('.', $fileName);

// Get the last element in the array
$ext = end($splitedFileName);

$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

// Check if my extension is in allowed extensions array
if (in_array($ext, $allowedExtensions)) {
  echo "File is allowed";
} else {
  echo "File is not allowed";
}
