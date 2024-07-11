<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $pswRepeat = $_POST["pswRepeat"];

    $host = "localhost";
    $db__name = "user_db";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password, $db__name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email is already registered
    $sql = "SELECT email FROM registration WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "This email is already registered. Please <a href='login.html'>login</a>.";
    } else {
        if ($psw !== $pswRepeat) {
            echo "Passwords do not match. Please try again.";
        } else {
            $psw_hashed = password_hash($psw, PASSWORD_DEFAULT);
            $sql = "INSERT INTO registration (email, psw) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $psw_hashed);

            if ($stmt->execute()) {
                echo "Registration successful. Please <a href='login.html'>login</a>.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }

    $stmt->close();
    $conn->close();
}
?>
