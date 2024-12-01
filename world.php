<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $country = isset($_GET['country']) ? $_GET['country'] : '';
  $lookup = isset($_GET['lookup']) ? $_GET['lookup'] : '';

  if($lookup == "cities"){
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>District</th>";
    echo "<th>Population</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($results as $row){
      echo "<tr>";
      echo "<td>" . htmlentities($row['name']) . "</td>";
      echo "<td>" . htmlentities($row['district']) . "</td>";
      echo "<td>" . htmlentities($row['population']) . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }else{
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
  
   
}


?>
