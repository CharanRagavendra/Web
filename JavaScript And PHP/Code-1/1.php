<?php
// Function to write user info and jcomponent writeup to a file
function writeToFile($name, $age, $marks, $jcomponentWriteup, $filename) {
    $data = "Name: $name\nAge: $age\nMarks: $marks\n\nJcomponent Writeup:\n$jcomponentWriteup\n\n";
    file_put_contents($filename, $data, FILE_APPEND);
}

// Function to read and display the contents of a file
function readAndDisplayFile($filename) {
    $content = file_get_contents($filename);
    echo nl2br($content); // nl2br() is used to display newlines as <br> tags in HTML
}

// File to store data
$filename = 'report.txt';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $age = $_POST["age"];
    $marks = $_POST["marks"];
    $jcomponentWriteup = $_POST["jcomponent_writeup"];

    // Write data to file
    writeToFile($name, $age, $marks, $jcomponentWriteup, $filename);
}

// Display total report
readAndDisplayFile($filename);
?>
