<?php
// Create a new mysqli connection
$conn = new mysqli('mysqli_db', 'root', 'root', 'wali_db');

// Check if the connection was successful
if ($conn->connect_error) {
    // If there's a connection error, terminate with an error message
    die("Connection failed: " . $conn->connect_error);
}

// Output success message
echo "Connected to DB";
echo "<br>";

// Query to fetch data from a specific table
$table_name = 'wali_table';  // Replace with your table name
$sql = "SELECT * FROM $table_name";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Display data from the table
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
