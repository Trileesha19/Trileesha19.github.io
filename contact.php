<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $name = htmlspecialchars($_POST['name']); // Sanitize input
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Send an email (basic example)
    $to = "your-email@example.com"; // Replace with your email
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    $emailBody = "Name: $name\n";
    $emailBody .= "Email: $email\n\n";
    $emailBody .= "Message:\n$message\n";

    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Thank you, $name! Your message has been sent.";
    } else {
        echo "Sorry, there was an issue sending your message.";
    }
} else {
    echo "Invalid request method.";
}
?>
