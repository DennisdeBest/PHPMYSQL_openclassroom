<?php
require_once ("mysqlCreds.php");

// Create connection
$conn = mysqli_connect($host, $username, $password, $db);

$sql = "SELECT * FROM `$table` ORDER BY id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table id='resultTable'>";
    echo "<thead>";
    echo "<tr><th>Date</th><th>Name</th><th>Message</th>";
    echo "</thead>";
    echo "</tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='datetime'>";
        echo $row['datetime'];
        echo "</td>";
        echo "<td class='pseudo'>";
        echo "</span>".$row['username']." : ";
        echo "</td>";
        echo "<td class='message'>";
        echo $row['message'];
        echo "</td>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?> 