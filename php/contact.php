<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $honeypot = trim($_POST["honeypot"]);

    // Spam protection
    if (!empty($honeypot)) {
        die("Bot detected!");
    }

    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        die("Invalid name.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email.");
    }
    $captcha = $_POST["captcha"];
    if ($captcha != "5") {
    die("Incorrect CAPTCHA!");
    }


    // Database Connection
    $conn = new mysqli("localhost", "root", "", "assignment_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Thank you! Your message has been received.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Send Email Notification
    $to = "your-email@example.com"; 
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    mail($to, $subject, $body, $headers);
}
?>
