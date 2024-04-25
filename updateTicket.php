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

    // Check if the form is submitted for updating
    if (isset($_POST['submit'])) {
        // Retrieve the updated comment from the form
        $updatedComment = $_POST['comment'];

        // Prepare an update query
        $query = "UPDATE contactUs SET comments = '$updatedComment' WHERE id = '$ticketID'";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            echo "Ticket ID $ticketID has been updated successfully.";
        } else {
            echo "Error updating ticket: " . mysqli_error($conn);
        }
    }

    // Retrieve the existing comment for the ticket
    $query = "SELECT comments FROM contactUs WHERE id = '$ticketID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $existingComment = $row['comments'];
    mysqli_free_result($result);
}
?>


<style>
body {
    background-image: url("https://images.unsplash.com/photo-1528458909336-e7a0adfed0a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YWVzdGhldGljJTIwbmV3c3BhcGVyJTIwYmFja2dyb3VuZHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=700&q=60");
}
    form {
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    textarea {
        padding: 10px;
        border: 1px solid #E5E5E5;
        width: 400px;
        max-width: 100%;
        color: #999999;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
    }

    input[type="submit"] {
        margin-top: 10px;
        background-color: #474E69;
        color: #FFF;
        border-radius: 3px;
        padding: 10px 20px;
        cursor: pointer;
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

<!-- HTML form to update the ticket comment -->
<form action="" method="POST">
    <label for="comment">Ticket Comment:</label>
    <textarea name="comment" id="comment" rows="4" cols="50"><?php echo $existingComment; ?></textarea>
    <br>
    <input type="submit" name="submit" value="Update">
</form>

<!-- Go back option -->
<a href="readTicket.php"" class="go-back">Go Back</a>























