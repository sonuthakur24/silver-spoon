<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

// Validate name
if (empty($name)) {
    $errors['name'] = "Name is required";
} elseif (strlen($name) < 2) {
    $errors['name'] = "Name must be at least 2 characters long";
}

// Validate email
if (empty($email)) {
    $errors['email'] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}

// Validate phone
if (empty($phone)) {
    $errors['phone'] = "Phone number is required";
} elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors['phone'] = "Invalid phone number format (10 digits required)";
}

// Validate message
if (empty($message)) {
    $errors['message'] = "Message is required";
} elseif (strlen($message) < 10) {
    $errors['message'] = "Message must be at least 10 characters long";
}

// If there are no errors, process the form
if (empty($errors)) {
    // Here you would typically save the data to a database or send an email
    // For this example, we'll just set a success message
    $success_message = "Thank you for your message. We'll get back to you soon!";
    
    // Clear the form fields
    $_POST = array();
}