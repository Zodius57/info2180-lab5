<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $country = isset($_GET['country']) ? $_GET['country'] : '';

  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  echo "<ul>";
  foreach ($results as $row){
    echo "<li>" . htmlentities($row['name']) . ' is ruled by ' . htmlentities($row['head_of_state']) . "</li>";
  }
  echo "</ul>"; 
}


?>
