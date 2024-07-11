<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $psw = $_POST["psw"];

    $host = "localhost";
    $db__name = "user_db";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password, $db__name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT psw FROM registration WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Failed to prepare the SQL statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_psw);
    $stmt->fetch();

    // Debugging outputs
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Hashed password from database: " . htmlspecialchars($hashed_psw) . "<br>";
    echo "Provided password: " . htmlspecialchars($psw) . "<br>";

    if ($stmt->num_rows > 0) {
        // Email exists, verify the password
        if (password_verify($psw, $hashed_psw)) {
            echo "Password verification successful.";
            // Start a session
            $_SESSION["email"] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // Incorrect password
            echo "Password verification failed. Incorrect password. Please try again.";
        }
    } else {
        // Email does not exist
        echo "No account found with that email. Please <a href='register.html'>register</a>.";
    }

    $stmt->close();
    $conn->close();
}
?>
