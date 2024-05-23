<?php


/**
 * Processes the contact form submission.
 *
 * @param mysqli $conn The database connection.
 * @return void
 */
function processContactForm($conn) {
    $currentDateTime = new DateTime();
    $time = $currentDateTime->format('Y-m-d H:i:s');

    if (isset($_POST['submit'])) {
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $message = sanitizeInput($_POST['message']);
        $subject = sanitizeInput($_POST['subject']);

        $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `subject`, `receive_at`)
                VALUES (?, ?, ?, ?, ?)";
        $send = $conn->prepare($sql);
        $send->bind_param('sssss', $name, $email, $message, $subject, $time);

        if ($send->execute()) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            echo "Can't send any message at this moment!";
        }
    }
}

/**
 * Sanitizes input data to prevent XSS and other security issues.
 *
 * @param string $input The input data.
 * @return string The sanitized input data.
 */
function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Call the function to process the contact form
processContactForm($conn);
?>