<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - الحجوزات</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #f5f5f5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: right;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        .btn {
            padding: 5px 10px;
            margin: 2px;
            cursor: pointer;
        }

        .btn-delete {
            background: #f44336;
            color: white;
            border: none;
        }

        .btn-edit {
            background: #2196F3;
            color: white;
            border: none;
        }

        .btn-add {
            background: #4CAF50;
            color: white;
            border: none;
        }

        h1 {
            text-align: center;
        }

        .msg {
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
            color: green;
        }

        form {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        form input {
            padding: 5px;
            margin: 5px;
        }

        form label {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>

<body>
    <h1>لوحة التحكم - الحجوزات</h1>

    <?php
    require_once 'db.php';

    $msg = '';

    // التعامل مع Insert و Update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $yacht_name = trim($_POST['yacht_name'] ?? '');
        $hours = intval($_POST['hours'] ?? 0);
        $booking_date = trim($_POST['booking_date'] ?? '');
        $id = intval($_POST['id'] ?? 0);

        if (empty($name) || empty($phone) || empty($email) || empty($yacht_name) || $hours <= 0 || empty($booking_date)) {
            $msg = "جميع الحقول مطلوبة!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "البريد الإلكتروني غير صحيح!";
        } else {
            if ($id > 0) {
                // تحديث البيانات (Update) بدون updated_at
                $stmt = $pdo->prepare("UPDATE bookings 
                    SET name=:name, phone=:phone, email=:email, yacht_name=:yacht_name, hours=:hours, booking_date=:booking_date
                    WHERE id=:id");
                $stmt->execute([
                    ':id' => $id,
                    ':name' => $name,
                    ':phone' => $phone,
                    ':email' => $email,
                    ':yacht_name' => $yacht_name,
                    ':hours' => $hours,
                    ':booking_date' => $booking_date
                ]);
                $msg = "تم تحديث الحجز بنجاح!";
            } else {
                // إضافة جديد (Insert)
                $stmt = $pdo->prepare("INSERT INTO bookings (name, phone, email, yacht_name, hours, booking_date, created_at) 
                    VALUES (:name,:phone,:email,:yacht_name,:hours,:booking_date,NOW())");
                $stmt->execute([
                    ':name' => $name,
                    ':phone' => $phone,
                    ':email' => $email,
                    ':yacht_name' => $yacht_name,
                    ':hours' => $hours,
                    ':booking_date' => $booking_date
                ]);
                $msg = "تم إضافة الحجز بنجاح!";
            }
        }
        echo "<div class='msg'>$msg</div>";
    }

    // عملية الحذف
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
        $stmt->execute([$id]);
        echo "<div class='msg'>تم الحذف بنجاح</div>";
    }

    // الحصول على بيانات الحجز للتعديل
    $edit_booking = null;
    if (isset($_GET['edit'])) {
        $edit_id = intval($_GET['edit']);
        $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = ?");
        $stmt->execute([$edit_id]);
        $edit_booking = $stmt->fetch();
        if (!$edit_booking) {
            echo "<div class='msg' style='color:red;'>الحجز غير موجود</div>";
        }
    }

    // جلب جميع الحجوزات
    $stmt = $pdo->query("SELECT * FROM bookings ORDER BY id DESC");
    $bookings = $stmt->fetchAll();
    ?>

    <!-- فورم الإضافة / التعديل -->
    <form method="post">
        <h3><?= $edit_booking ? "تعديل الحجز" : "إضافة حجز جديد" ?></h3>
        <input type="hidden" name="id" value="<?= $edit_booking['id'] ?? 0 ?>">
        <label>الاسم:</label>
        <input type="text" name="name" value="<?= $edit_booking['name'] ?? '' ?>"><br>
        <label>الهاتف:</label>
        <input type="text" name="phone" value="<?= $edit_booking['phone'] ?? '' ?>"><br>
        <label>البريد:</label>
        <input type="email" name="email" value="<?= $edit_booking['email'] ?? '' ?>"><br>
        <label>اليخت:</label>
        <input type="text" name="yacht_name" value="<?= $edit_booking['yacht_name'] ?? '' ?>"><br>
        <label>الساعات:</label>
        <input type="number" name="hours" value="<?= $edit_booking['hours'] ?? '' ?>"><br>
        <label>التاريخ:</label>
        <input type="date" name="booking_date" value="<?= $edit_booking['booking_date'] ?? '' ?>"><br>
        <input type="submit" class="btn btn-add" value="<?= $edit_booking ? "تحديث الحجز" : "إضافة حجز" ?>">
    </form>

    <!-- جدول الحجوزات -->
    <table>
        <tr>
            <th>رقم</th>
            <th>الاسم</th>
            <th>الهاتف</th>
            <th>البريد</th>
            <th>اليخت</th>
            <th>الساعات</th>
            <th>التاريخ</th>
            <th>عمليات</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= $booking['id'] ?></td>
                <td><?= $booking['name'] ?></td>
                <td><?= $booking['phone'] ?></td>
                <td><?= $booking['email'] ?></td>
                <td><?= $booking['yacht_name'] ?></td>
                <td><?= $booking['hours'] ?></td>
                <td><?= $booking['booking_date'] ?></td>
                <td>
                    <button class="btn btn-delete"
                        onclick="if(confirm('هل تريد حذف هذا الحجز؟')) location.href='?delete=<?= $booking['id'] ?>'">
                        حذف
                    </button>
                    <button class="btn btn-edit"
                        onclick="location.href='?edit=<?= $booking['id'] ?>'">
                        تعديل
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p style="text-align:center; margin-top:20px">
        إجمالي الحجوزات: <strong><?= count($bookings) ?></strong>
    </p>

</body>

</html>