<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="background"></div>
  <div class="container">
    <h2>Sign In</h2>
    <?php
    if (isset($_GET['message'])) {
        echo "<p class='message'>{$_GET['message']}</p>";
    }
    ?>
    <form action="authenticate.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign In</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
  </div>
</body>
</html>