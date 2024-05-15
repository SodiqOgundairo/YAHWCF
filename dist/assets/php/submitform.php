<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');

// Print received data for debugging
// print_r($_POST);

$data = json_encode(
    array(
        "fname" => $_POST['fname'],
        'lname' => $_POST['lname'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'country' => $_POST['country'],
        'attending' => $_POST['attending'],
    )
);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yawhcf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'INSERT INTO reg (data) VALUES (?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $data);

if($stmt->execute()) {
    echo '<p style="text-align:center">Your Registration has been added successfully, <br/> you will now be redirected back to the website, <br/ if you are not redirected automatically Cick below</p>';
    echo '<a href="../../index.html">Go back Home</a>';
    
    // Redirect to another page after 2 seconds
    header("refresh:1;url=../../index.html");
    
    exit(); // Stop further execution
} else {
    echo 'Error adding data: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
