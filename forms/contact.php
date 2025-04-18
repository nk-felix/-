<?php
// Define variables and set to empty values
$name = $email = $subject = $message = "";
$errors = [];
$success = false;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Validate inputs
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, proceed with sending email
    if (empty($errors)) {
        // Set recipient email to your specified email address
        $recipient_email = "lax2206x@gmail.com";
        
        // Create email headers
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        
        // Prepare email body
        $email_body = "
            <html>
            <head>
                <title>New Contact Form Submission</title>
            </head>
            <body>
                <h2>Contact Form Submission</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong></p>
                <p>" . nl2br($message) . "</p>
            </body>
            </html>
        ";
        
        // Send email
        $mail_sent = mail($recipient_email, "Contact Form: $subject", $email_body, $headers);
        
        // Check if mail was sent successfully
        if ($mail_sent) {
            $success = true;
            echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);
        } else {
            $errors[] = "Failed to send email. Please try again later.";
            echo json_encode(['status' => 'error', 'message' => 'Failed to send email. Please try again later.']);
        }
    } else {
        // Return errors as JSON
        echo json_encode(['status' => 'error', 'message' => implode("<br>", $errors)]);
    }
    
    exit; // Stop script execution after processing
}
?>
