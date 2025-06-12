<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "support@sbtechsolution.com";
    $subject = "New Computer Repair Request - Sandeep Tech Services";

    // Sanitize and collect data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $computerType = htmlspecialchars($_POST["computerType"]);
    $os = htmlspecialchars($_POST["os"]);
    $processor = htmlspecialchars($_POST["processor"]);
    $ram = htmlspecialchars($_POST["ram"]);
    $storage = htmlspecialchars($_POST["storage"]);
    $graphics = htmlspecialchars($_POST["graphics"]);
    $issueCategory = htmlspecialchars($_POST["issueCategory"]);
    $preferredTime = htmlspecialchars($_POST["preferredTime"]);
    $issueDetails = htmlspecialchars($_POST["issueDetails"]);

    // Compose message
    $message = "
You have received a new repair request from your website:

Name: $name
Email: $email
Phone: $phone
Computer Type: $computerType
Operating System: $os
Processor: $processor
RAM Type: $ram
Storage Type: $storage
Graphics: $graphics
Issue Type: $issueCategory
Preferred Time Slot: $preferredTime

Issue Description:
$issueDetails
";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h3 style='text-align:center;color:green;'>Thank you! Your request has been submitted. We will contact you soon.</h3>";
    } else {
        echo "<h3 style='text-align:center;color:red;'>Sorry, there was a problem sending your request. Please try again later.</h3>";
    }
} else {
    echo "Invalid request method.";
}
?>
