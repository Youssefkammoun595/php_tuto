<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'learning_db';
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $role = $_POST['role'];
    // Insert user into database
    $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role
        ]);

        // Redirect to signin page with a success message
        header("Location: signin.php?message=Registration successful! Please log in.");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Debugging
    }
}
?>