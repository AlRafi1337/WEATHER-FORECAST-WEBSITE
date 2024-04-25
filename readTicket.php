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

        // Function to delete a ticket based on the ID
        function deleteTicket($conn, $id) {
                $query = "DELETE FROM contactUs WHERE id = '$id'";
                if (mysqli_query($conn, $query)) {
                        echo "Ticket ID $id has been deleted successfully.";
                        } else {
                        echo "Error deleting ticket: " . mysqli_error($conn);
                }
        }

        if (isset($_POST['email'])) {
                $email = $_POST['email'];

                // Prepare a SQL query to fetch the ticket IDs for the given email
                $query = "SELECT id, comments FROM contactUs WHERE email = '$email'";

                // Execute the query
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                        // Display the ticket ID and message
                        echo "Tickets for $email:<br>";
                        while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                echo "Ticket ID: $id";
                                echo "Message: " . $row['comments'] . "<br><br>";
                                echo " <a href='updateTicket.php?id=$id'>Update</a>";
                                echo " <a href='deleteTicket.php?id=$id'>Delete</a><br>";
                        }
                        } else {
                        echo "No tickets found for $email";
                }

                // echo "Ticket ID: " . $row['id'] . "<br>";
                // echo "Message: " . $row['comments'] . "<br><br>";
        // }
                // } else {
        // echo "No tickets found for $email";
                // }


                // Free the result set
                mysqli_free_result($result);
        }

        // Close the database connection
        mysqli_close($conn);
?>

<!-- HTML form to enter the email -->
<form action="" method="POST" class="ticket-form">
    <label for="email">Enter Email:</label>
    <input type="text" name="email" id="email" required>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- Go back option -->
<a href="contact_form.html"" class="go-back">Go Back</a>


    <script>
        <?php if (isset($_GET['id'])) : ?>
            alert('Ticket ID <?php echo $ticketID; ?> has been deleted successfully.');
        <?php endif; ?>
    </script>

<style>
        body{
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