<?php
// Retrieve order details and recipient email from the request
$orderDetails = $_POST['orderDetails'];
$total = $_POST['total'];
$recipientEmail = $_POST['recipientEmail']; // Make sure to update this variable in the JavaScript code

// Construct email message
$message = "Thank you for your purchase!\n\n";
$message .= "Order Details:\n";
foreach ($orderDetails as $item) {
    $message .= "{$item['name']} - Price: {$item['price']} - Quantity: {$item['qty']}\n";
}
$message .= "\nTotal: $total";

// Set up email headers
$senderEmail = 'noreply@example.com'; // Update with your sender email address
$replyToEmail = 'support@example.com'; // Update with your support email address
$headers = 'From: ' . $senderEmail . "\r\n" .
    'Reply-To: ' . $replyToEmail . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Send the email
$subject = 'Purchase Confirmation';
if (mail($recipientEmail, $subject, $message, $headers)) {
    // Email sent successfully
    echo json_encode(['success' => true]);
} else {
    // Email sending failed
    echo json_encode(['success' => false]);
}
?>
