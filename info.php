<?php
// Establish a connection to your MySQL database. 
$servername = "localhost";
$username = "root";
$password = "";
$database = "drone_registration";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$nic = $_POST['nic'];
$name = $_POST['name'];
$address = $_POST['address'];
$insurance = $_POST['insurance'];
$manufacture = $_POST['manufacture'];
$model = $_POST['model'];
$serial = $_POST['serial'];
$altitude = $_POST['altitude'];
$drone_class = $_POST['drone_class'];
$type = $_POST['type'];




//Check Duplicate primary key
$checkQuery = "SELECT * FROM pilot_details WHERE nic = '$nic'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    
    echo "Error: This NIC is already in use.";
} 

// Insert the data into the database
else{

    $sql = "INSERT INTO pilot_details (nic,name,address,insurance,manufacture,model,serial,altitude,drone_class,type) VALUES ('$nic','$name','$address','$insurance','$manufacture','$model','$serial','$altitude','$drone_class','$type')";

    if ($conn->query($sql) === TRUE) {
        header('location:thanks.html');
       // echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


$conn->close();
?>
