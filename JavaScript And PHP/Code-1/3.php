<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "covid_cases";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $vaccine_type = $_POST["vaccine_type"];

    $sql = "INSERT INTO cases (name, age, vaccine_type) VALUES ('$name', $age, '$vaccine_type')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Delete a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM cases WHERE id=$id";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Display count in a week in descending order
$sql = "SELECT COUNT(*) AS count, DATE(created_at) AS date FROM cases GROUP BY DATE(created_at) ORDER BY date DESC LIMIT 7";
$result = $conn->query($sql);

echo "<h2>Count in a Week (Descending Order)</h2>";
echo "<table border='1'><tr><th>Date</th><th>Count</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["date"] . "</td><td>" . $row["count"] . "</td></tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>