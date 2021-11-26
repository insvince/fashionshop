<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "h_store";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
  }

