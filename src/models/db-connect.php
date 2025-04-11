<?php
/************** Database link **************/
function dbConnect($tableName)
{
  // Variables Database
  $servername = "localhost";
  $username = "root";
  $password = "1234";

  $conn = new PDO("mysql:host=$servername;dbname=$tableName", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}

