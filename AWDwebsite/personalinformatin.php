<?php

$linkserver= mysqli_connect("localhost","root","","MYuserinfordb");

if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}




$userID = 1; // Assuming you have a logged-in user with ID 1

$sql = "SELECT * FROM userinformation WHERE id = $userID";
$result = mysqli_query($linkserver, $sql);


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit;
}

// Handle email update logisc
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newEmail = $_POST['new_email'];

    // Update the user's email in the database
    $updateSql = "UPDATE userinformation SET email = '$newEmail' WHERE id = $userID";

    if (mysqli_query($linkserver, $updateSql)) {
        echo "Email updated successfully.";
        $user['email'] = $newEmail;
    } else {
        echo "Error updating email: " . mysqli_error($linkserver);
    }

    }

// Close the database connection
mysqli_close($linkserver);



?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        /* CSS styles for the profile page */
body {
  background-color: #c1a967;
  font-family: Arial, sans-serif;
}

.profile-container {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}

h1 {
  text-align: center;
  color: #333;
}

.profile-info {
  margin-bottom: 10px;
}

label {
  font-weight: bold;
  color: #333;
}

span {
  color: #666;
}

.update-form {
  margin-top: 20px;
}

h2 {
  color: #333;
}

form {
  margin-top: 10px;
}

input[type="email"] {
  padding: 10px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

.success-message {
  color: green;
  margin-top: 10px;
}
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <label>Name:</label>
            <span><?php echo $user['User_name']; ?></span>
        </div>
        <div class="profile-info">
            <label>Email:</label>
            <span class="email"><?php echo $user['email']; ?></span>
        </div>
        <div class="profile-info">
            <label>City:</label>
            <span class="city"><?php echo $user['User_city']; ?></span>
        </div>
        
        <div class="update-form">
            <h2>Update Email</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="new_email">New Email:</label>
                <br>
                <br>
                <input type="email" id="new_email" name="new_email" placeholder="Enter new email" required>
                <br>
                <br>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>