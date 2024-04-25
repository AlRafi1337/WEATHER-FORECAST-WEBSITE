<?php 
$servername = "localhost";
$username = "miloSquad";
$password = "12345";
$dbname = "omodb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



  //creating connection to database
//$con=mysqli_connect("localhost","root","","omo") or die(mysqli_error());

// sql to create table
// $sql = "CREATE TABLE contactUs (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// name VARCHAR(30) NOT NULL,
// email VARCHAR(30) NOT NULL,
// phone VARCHAR(20) NOT NULL,
// comments VARCHAR(1000),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if (mysqli_query($conn, $sql)) {
  // echo "Table contactUs created successfully";
// } else {
  // echo "Error creating table: " . mysqli_error($conn);
// }
 
 //check whether submit button is pressed or not
if((isset($_POST['submit'])))
{
  //fetching and storing the form data in variables
$Name = $conn->real_escape_string($_POST['name']);
$Email = $conn->real_escape_string($_POST['email']);
$Phone = $conn->real_escape_string($_POST['contact']);
$comments = $conn->real_escape_string($_POST['text']);

  //query to insert the variable data into the database
$sql="INSERT INTO contactUs (name, email, phone, comments) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."')";

  //Execute the query and returning a message
// if(!$result = $conn->query($sql)){
// die('Error occured [' . $conn->error . ']');
// }
// else
   // echo "Thank you! We will get in touch with you soon";
// }

// if(mysqli_query($conn, $sql)) {
    // echo '<script>alert("Thank you! We will get in touch with you soon");</script>';
  // } else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }
// }

// Execute the query and redirect with success message
  if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("Location: contact_form.html?success=true");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>