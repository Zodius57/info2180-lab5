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
  
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Continent</th>";
  echo "<th>Independence</th>";
  echo "<th>Head of State</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($results as $row){
    echo "<tr>";
    echo "<td>" . htmlentities($row['name']) . "</td>";
    echo "<td>" . htmlentities($row['continent']) . "</td>";
    echo "<td>" . htmlentities($row['independence_year']) . "</td>";
    echo "<td>" . htmlentities($row['head_of_state']) . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
   
}


?>
