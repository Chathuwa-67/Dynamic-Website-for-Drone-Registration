<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'civil_aviation_authority';

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get data from the form for Table 1 Pilot details
$pilot_id = $_POST['pilot_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$license = $_POST['license'];

// Insert data into Table 1
$sql_table1 = "INSERT INTO pilot_details (pilot_id,name,address,license) VALUES ('$pilot_id', '$name', '$address', '$license')";

if (mysqli_query($conn, $sql_table1)) {
    echo "Data inserted into Table 1 successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}


// Get data from the form for Table 2 Drone Model Details
$drone_model_id = $_POST['drone_model_id'];
$model_name = $_POST['model_name'];


// Insert data into Table 2
$sql_table2 = "INSERT INTO drone_models (drone_model_id,model_name) VALUES ('$drone_model_id','$model_name')";

if (mysqli_query($conn, $sql_table2)) {
    echo "Data inserted into Table 2 successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Get data from the form for Table 3 Drone Details
$drone_id = $_POST['drone_id'];
$serial = $_POST['serial'];


// Insert data into Table 3
$sql_table3 = "INSERT INTO drone_details (drone_id,serial,drone_model_id,pilot_id) VALUES ('$drone_id', '$serial','$drone_model_id','$pilot_id')";

if (mysqli_query($conn, $sql_table3)) {
    echo "Data inserted into Table 3 successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}


// Insert data into Table 4 Insuarence Details
$insurance_id = $_POST['insurance_id'];
$period = $_POST['period'];
$provider = $_POST['provider'];

$sql_table4 = "INSERT INTO insurence_details (insurance_id,period,provider,drone_id) VALUES ('$insurance_id', '$period','$provider','$drone_id')";

if (mysqli_query($conn, $sql_table4)) {
    echo "Data inserted into Table 4 successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}


// Insert data into Table 5 Insuarence Details
$company_id = $_POST['company_id'];
$company_name = $_POST['company_name'];
$manufacture_date = $_POST['manufacture_date'];

$sql_table5 = "INSERT INTO company_details (company_id,company_name,manufacture_date,drone_model_id) VALUES ('$company_id', '$company_name','$manufacture_date','$drone_model_id')";

if (mysqli_query($conn, $sql_table5)) {
    echo "Data inserted into Table 5 successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}


// Insert data into Table 6 Insuarence Details
$specification_id = $_POST['specification_id'];
$drone_class = $_POST['drone_class'];
$drone_type = $_POST['drone_type'];

$sql_table6 = "INSERT INTO specification_details (specification_id,drone_class,drone_type,drone_model_id) VALUES ('$specification_id', '$drone_class','$drone_type','$drone_model_id')";

if (mysqli_query($conn, $sql_table6)) {
    echo "Data inserted into Table 6 successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}


//Insert into full Details
$sql_table7 = "INSERT INTO full_details (pilot_id,drone_id,drone_model_id,specification_id,company_id,insurance_id ) VALUES ('$pilot_id', '$drone_id','$drone_model_id','$specification_id','$company_id','$insurance_id')";

if (mysqli_query($conn, $sql_table7)) {
    echo "Data inserted into Table 7 successfully.<br>";
    header("Location:thanks.php ");
exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
 






// Close the database connection
mysqli_close($conn);
?>
