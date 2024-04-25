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

// Check if the ticket ID is provided
if (isset($_GET['id'])) {
    $ticketID = $_GET['id'];

    // Prepare a delete query
    $query = "DELETE FROM contactUs WHERE id = '$ticketID'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Ticket ID $ticketID has been deleted successfully.');</script>";
    } else {
        echo "Error deleting ticket: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Delete Ticket</title>
    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1528458909336-e7a0adfed0a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YWVzdGhldGljJTIwbmV3c3BhcGVyJTIwYmFja2dyb3VuZHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=700&q=60");
        }

        .ticket-form {
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        .ticket-form label {
            display: block;
            margin-bottom: 10px;
        }

        .ticket-form input[type="text"],
        .ticket-form input[type="submit"] {
            padding: 10px;
            border: 1px solid #E5E5E5;
            width: 200px;
            color: #999999;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
        }

        .ticket-form input[type="submit"] {
            margin-top: 10px;
            background-color: #474E69;
            color: #FFF;
            border-radius: 3px;
        }

        .go-back {
            display: inline-block;
            margin-top: 10px;
            background-color: #AB0341;
            color: #FFF;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .go-back:hover {
            background-color: #89022e;
        }
    </style>
</head>
<body>
    <form action="" method="POST" class="ticket-form">
        <label for="email">Enter Email:</label>
        <input type="text" name="email" id="email" required>
        <input type="submit" name="submit" value="Submit">
    </form>

    <!-- Go back option -->
    <a href="contact_form.html" class="go-back">Go Back</a>

    <script>
        <?php if (isset($_GET['id'])) : ?>
            alert('Ticket ID <?php echo $ticketID; ?> has been deleted successfully.');
        <?php endif; ?>
    </script>
</body>
</html>



