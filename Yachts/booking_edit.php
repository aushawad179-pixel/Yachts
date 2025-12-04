<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM bookings WHERE id=$id");
$data = $result->fetch_assoc();
?>

<form action="booking_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    الاسم: <input type="text" name="fullname" value="<?php echo $data['fullname']; ?>"><br>
    الهاتف: <input type="text" name="phone" value="<?php echo $data['phone']; ?>"><br>
    التاريخ: <input type="text" name="date" value="<?php echo $data['date']; ?>"><br>
    الوقت: <input type="text" name="time" value="<?php echo $data['time']; ?>"><br>
    الملاحظة: <textarea name="message"><?php echo $data['message']; ?></textarea><br>

    <button type="submit" name="update">تحديث</button>
</form>