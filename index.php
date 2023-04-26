<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Gather form data into variables
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $blood_type = $_POST['blood_type'];

  // Connect to database
  $servername = "localhost";
  $username = "your_username";
  $password = "your_password";
  $dbname = "your_database_name";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert data into database
  $sql = "INSERT INTO blood_donors (name, email, phone, blood_type)
          VALUES ('$name', '$email', '$phone', '$blood_type')";

  if (mysqli_query($conn, $sql)) {
    echo "Thank you for your donation!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

} else {

  // If the form has not been submitted, display the form
  echo '
  <form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" required><br>

    <label for="blood_type">Blood Type:</label>
    <select name="blood_type" required>
      <option value="">Select a blood type</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
    </select><br>

    <input type="submit" value="Donate">
  </form>
  ';

}
?>
