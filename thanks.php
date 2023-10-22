<!––2019/ICTS/67 Gihan Chathuranga Gunathilaka DBMS Project-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>index</title>
  <link rel="stylesheet" href="./thanksstyle.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-image: url('./images/thanks/1.jpg');  
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0; 
      text-align: left; 
    }
  </style>
</head>
<body>
  <ul class="begin">
    <li><a href="./index.html">CIVIL AVIATION AUTHORITY SRI LANKA</a></li>
  </ul>

  <ul>
    <li><a href="./index.html">Home</a></li>
    <li><a href="./registration.html">Register</a></li>
    <li><a href="./buydrone.html"> Buy Drone</a></li>
    <li><a href="./news.html">News</a></li>
    <li><a href="./regulations.html">Regulations</a></li>
    <li><a href="./contact.html">Contact</a></li>
    <li><a href="./About.html">About</a></li>
     
  </ul>
  <div>
  <table>


         
  
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "civil_aviation_authority";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT 
                *
                FROM pilot_details pd
                JOIN drone_details dd ON pd.pilot_id = dd.pilot_id
                JOIN drone_models dm ON dd.drone_model_id = dm.drone_model_id
                JOIN specification_details sd ON dm.drone_model_id = sd.drone_model_id
                JOIN company_details cd ON dm.drone_model_id = cd.drone_model_id
                JOIN insurence_details id ON dd.drone_id = id.drone_id
                ORDER BY pd.pilot_id DESC
                LIMIT 1;
            ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<tr> <th> Pilot ID : </th> <td>" . $row['pilot_id'] . "</td></tr>";
            echo "<tr> <th> Full Name : </th> <td>" . $row['name'] . "</td> </tr>";
            echo "<tr> <th> Address : </th> <td>" . $row['address'] . "</td></tr>";
            echo "<tr> <th> License Number : </th> <td>" . $row['license'] . "</td> </tr>";
            
            echo "<tr> <th> Drone ID : </th> <td>" . $row['drone_id'] . "</td> </tr>";
            echo "<tr> <th> Drone Model : </th> <td>" . $row['model_name'] . "</td> </tr>";
            echo "<tr> <th> Serial Number : </th> <td>" . $row['serial'] . "</td> </tr>";

            echo "<tr> <th> Company ID : </th> <td>" . $row['company_id'] . "</td> </tr>";
            echo "<tr> <th> Company Name : </th> <td>" . $row['company_name'] . "</td> </tr>";
            echo "<tr> <th> Manufactured Date : </th> <td>" . $row['manufacture_date'] . "</td> </tr>";

            echo "<tr> <th> Insurance ID : </th> <td>" . $row['insurance_id'] . "</td> </tr>";
            echo "<tr> <th> Warranty Period : </th> <td>" . $row['period'] . "</td> </tr>";
            echo "<tr> <th> Insurance Provider : </th> <td>" . $row['provider'] . "</td> </tr>";

            echo "<tr> <th> Specification ID : </th> <td>" . $row['specification_id'] . "</td> </tr>";
            echo "<tr> <th> Drone Class : </th> <td>" . $row['drone_class'] . "</td> </tr>";
            echo "<tr> <th> Drone Type : </th> <td>" . $row['drone_type'] . "</td> </tr>";
            
             

        
        }
    } else {
        echo "No data found.";
    }

    $conn->close();
    ?>


    
  </table>

  
    <h1>Thank you for Registering</h1>
    <h2>
        We appreciate your registration with the Civil Aviation Authority of Sri Lanka. Your registration information has been received and processed. If you have any questions or need further assistance, please feel free to contact our support team.
    </h2>
</div>




  <footer>
    ©CIVIL AVIATION AUTHORITY      All rights reserved(2019/ICTS/67).
  </footer>
</body>
</html>
