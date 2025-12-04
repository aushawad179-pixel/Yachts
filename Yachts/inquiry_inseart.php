<?php
include 'db.php';

if (isset($_POST['send'])) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO inquiries (name, email, message)
            VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql)) {
        echo "تم إرسال الاستفسار بنجاح";
    } else {
        echo "خطأ: " . $conn->error;
    }
}
