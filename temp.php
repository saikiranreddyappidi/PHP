<?php
$servername = "localhost";
$username = "root";
$password = "database@9440672439";
$dbname = "railway";

// Step 1: Connect to MySQL Server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Create the Database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Step 3: Select the Database
$conn->select_db($dbname);

// Step 4: Create the Student Information Table
$sql_create_table = "CREATE TABLE IF NOT EXISTS StudentInformation (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    attendance INT,
    exams INT,
    achievements INT
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Step 5: Insert Data into the Table
$sql_insert_data = "INSERT INTO StudentInformation (first_name, last_name, attendance, exams, achievements)
VALUES 
    ('John', 'Doe', 90, 85, 95),
    ('Jane', 'Smith', 95, 88, 100),
    ('Michael', 'Johnson', 88, 92, 80)";
if ($conn->query($sql_insert_data) === TRUE) {
    echo "Data inserted successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

// Step 6: Create Indexes
//$sql_create_index1 = "CREATE INDEX idx_attendance ON StudentInformation (attendance)";
//$sql_create_index2 = "CREATE INDEX idx_exams ON StudentInformation (exams)";
//$sql_create_index3 = "CREATE INDEX idx_achievements ON StudentInformation (achievements)";
//if ($conn->query($sql_create_index1) === TRUE && $conn->query($sql_create_index2) === TRUE && $conn->query($sql_create_index3) === TRUE) {
//    echo "Indexes created successfully\n";
//} else {
//    echo "Error creating indexes: " . $conn->error . "\n";
//}

// Close the connection
$conn->close(); ?>
