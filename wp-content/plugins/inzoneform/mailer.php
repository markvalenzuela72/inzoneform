<?php
include_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php');
// Required field names
$required = array('name', 'phone', 'email', 'message');

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Send the email.
    function setup_phpmailer_init($phpmailer)
    {
        global $wpdb;
        $table = 'wp_inzoneform';
        $results = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC LIMIT 1");
        foreach ($results as $row) {
            // im smtp settingss
            if ($row->mail == 'smtp') {
                $phpmailer->Host = $row->host; // for example, smtp.mailtrap.io
                $phpmailer->Port = $row->port; // set the appropriate port: 465, 2525, etc.
                $phpmailer->Username = $row->username; // your SMTP username
                $phpmailer->Password = $row->password; // your SMTP password
                $phpmailer->SMTPAuth = true;
                $phpmailer->SMTPSecure = 'tls'; // preferable but optional
                $phpmailer->IsSMTP();
            }
        }
    }
    add_action('phpmailer_init', 'setup_phpmailer_init');

    // Get the form fields and remove whitespace.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Check that data was sent to the mailer.
    if (empty($name) or empty($message) or empty($email) or empty($phone)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "There was a problem with your submission. Please complete the form and try again.";
        exit;
    }

    // Set the recipient email address.
    // FIXME: Update this to your desired email address.
    $recipient = "markvalenzuela72@gmail.com";

    // Set the email subject.`
    $subject = "New contact from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $admin_email = get_option('admin_email');
    $email_headers = "From: $name <$admin_email>";


    if (wp_mail($recipient, $subject, $email_content, $email_headers)) {
        // Set a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
