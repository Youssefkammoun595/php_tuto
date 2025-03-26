<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Sign Up</h2>
    <form action="register.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required oninput="checkPasswordStrength(this.value)">
      <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
      <div id="password-strength" class="hidden">
        <span id="strength-text">Weak</span>
        <div id="strength-bar"></div>
      </div>
      <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="signin.php">Sign In</a></p>
  </div>
  <script>
    function checkPasswordStrength(password) {
      const strengthBar = document.getElementById('strength-bar');
      const strengthText = document.getElementById('strength-text');
      const passwordStrength = document.getElementById('password-strength');

      // Show the password strength indicator when typing starts
      if (password.length > 0) {
        passwordStrength.classList.remove('hidden');
      } else {
        passwordStrength.classList.add('hidden');
      }

      const strength = calculatePasswordStrength(password);

      strengthBar.style.width = `${strength * 25}%`;
      strengthBar.style.backgroundColor = strength < 2 ? '#ff4d4d' : strength < 4 ? '#ffa500' : '#4CAF50';
      strengthText.textContent = strength < 2 ? 'Weak' : strength < 4 ? 'Medium' : 'Strong';
    }

    function calculatePasswordStrength(password) {
      let strength = 0;
      if (password.length >= 8) strength++;
      if (/[A-Z]/.test(password)) strength++;
      if (/[0-9]/.test(password)) strength++;
      if (/[^A-Za-z0-9]/.test(password)) strength++;
      return strength;
    }
  </script>
</body>
</html>