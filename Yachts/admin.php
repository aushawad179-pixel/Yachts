<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>عرض الحجوزات</title>
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

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>الحجوزات</h1>

    <?php
    require_once 'db.php';

    // عملية الحذف
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
        $stmt->execute([$id]);
        echo "<p style='color:green; text-align:center'>تم الحذف بنجاح</p>";
    }

    // عرض الحجوزات
    $stmt = $pdo->query("SELECT * FROM bookings ORDER BY id DESC");
    $bookings = $stmt->fetchAll();
    ?>

    <table>
        <tr>
            <th>رقم</th>
            <th>الاسم</th>
            <th>الهاتف</th>
            <th>البريد</th>
            <th>اليخت</th>
            <th>الساعات</th>
            <th>التاريخ</th>
            <th>حذف</th>
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
                        onclick="if(confirm('حذف؟')) location.href='?delete=<?= $booking['id'] ?>'">
                        حذف
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