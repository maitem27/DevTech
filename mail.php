<?php
header('Content-Type: application/json; charset=utf-8');

function sendJsonResponse($status, $message, $httpCode = 200) {
  http_response_code($httpCode);
  echo json_encode([
    'status' => $status,
    'message' => $message
  ]);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Allow: POST');
  sendJsonResponse('error', 'Method not allowed', 405);
}

$payload = file_get_contents('php://input');
$data = json_decode($payload, true) ?? $_POST;

if (!is_array($data)) {
  sendJsonResponse('error', 'Invalid request', 400);
}

$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$message = trim($data['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
  sendJsonResponse('error', 'Please fill in all fields', 400);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  sendJsonResponse('error', 'Please enter a valid email address', 400);
}

if (mb_strlen($name) > 100 || mb_strlen($message) > 5000) {
  sendJsonResponse('error', 'The name or message is too long', 400);
}

$to = getenv('CONTACT_TO');
$from = getenv('CONTACT_FROM');

if (!$to || !$from) {
  error_log('CONTACT_TO or CONTACT_FROM is not set');
  sendJsonResponse('error', 'An unexpected error occurred', 500);
}

$subject = 'New message from contact form - Web2Risk';

$body = "Name: $name\n";
$body .= "Email: $email\n\n";
$body .= "Message:\n$message\n";

$headers = "From: $from\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (!mail($to, $subject, $body, $headers)) {
  error_log('Email sending failed');
  sendJsonResponse('error', 'An unexpected error occurred', 500);
}

sendJsonResponse('success', 'Your message has been sent successfully. We will get back to you shortly.');
