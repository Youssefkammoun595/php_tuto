<?php
session_start();

// Redirect to signin page if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
     <!-- Sidebar -->
  <div class="sidebar">
    <h3>Menu</h3>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="signin.php?logout=1">Logout</a></li>
    </ul>
  </div>
  <div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You have successfully logged in as a <?php echo $_SESSION['role']; ?>.</p>
    <a href="signin.php?logout=1">Logout</a>
  </div>
</body>
</html>