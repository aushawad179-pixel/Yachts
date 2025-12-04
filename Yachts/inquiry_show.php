<?php
include 'db.php';

$result = $conn->query("SELECT * FROM inquiries ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    echo "
    <div>
        <h3>{$row['name']}</h3>
        <p>{$row['email']}</p>
        <p>{$row['message']}</p>

        <a href='inquiry_delete.php?id={$row['id']}'>حذف</a>
        <a href='inquiry_edit.php?id={$row['id']}'>تعديل</a>
        <hr>
    </div>
    ";
}
