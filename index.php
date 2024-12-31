<?php

include "connection.php";

// Define endpoints
$endpoints = [
  'home' => '/',
  'about' => '/about',
  'contact' => '/contact',
  'products' => '/products',
  'services' => '/services'
];

// Display endpoints
echo "<h1>Available Endpoints</h1>";
echo "<ul>";
foreach ($endpoints as $name => $url) {
  echo "<li><a href='$url'>$name</a></li>";
}
echo "</ul>";
