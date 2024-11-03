<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $guests = htmlspecialchars($_POST['guests']);

    // Email details
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Wedding RSVP from $name";
    $message = "
        You have a new RSVP for your wedding!\n
        Name: $name\n
        Email: $email\n
        Number of Guests: $guests\n
    ";

    // Headers
    $headers = "From: no-reply@yourwebsite.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you, $name! Your RSVP has been sent successfully.";
    } else {
        echo "Sorry, there was an issue sending your RSVP. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
