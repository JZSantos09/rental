<?php

$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=localhost;dbname=rydr", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

// $sql = "SELECT id, price, tank_volume, brand, build_year, color, mileage, steering, people_capacity, type_car, cylinder FROM rydr";
// // Execute the SQL query
// $result = $conn->query($sql);

// // Process the result set
// if ($result->num_rows > 0) {
//   // Output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - price: " . $row["tank_volume"]. " " . $row["brand"]. $row["build_year"]. $row["color"]. $row["mileage"]. $row["steering"]. $row["people_capacity"].$row["type_car"]. $row["cylinder"]."<br>";
//   }
// } else {
//   echo "0 results";
// }

// $conn->close();
?>