<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM inquiries WHERE id=$id";

if ($conn->query($sql)) {
    echo "تم حذف الاستفسار";
} else {
    echo "خطأ: " . $conn->error;
}
