<?php
// Database link
function dbConnect($tableName)
{
  $servername = "localhost";
  $username = "root";
  $password = "1234";

  $conn = new PDO("mysql:host=$servername;dbname=$tableName", $username, $password);
  // set the PDO error mode to exception
  return $conn;
}

