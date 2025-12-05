<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // استقبال البيانات
        $id = intval($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $yacht_name = trim($_POST['yacht_name'] ?? '');
        $hours = intval($_POST['hours'] ?? 0);
        $booking_date = trim($_POST['booking_date'] ?? '');

        // التحقق من البيانات
        if ($id <= 0) {
            throw new Exception('معرف الحجز مطلوب');
        }

        if (empty($name) || empty($phone) || empty($email) || empty($yacht_name) || $hours <= 0 || empty($booking_date)) {
            throw new Exception('جميع الحقول مطلوبة');
        }

        // التحقق من صحة البريد الإلكتروني
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('البريد الإلكتروني غير صحيح');
        }

        // التحقق من وجود الحجز
        $check_sql = "SELECT id FROM bookings WHERE id = :id";
        $check_stmt = $pdo->prepare($check_sql);
        $check_stmt->execute([':id' => $id]);

        if (!$check_stmt->fetch()) {
            throw new Exception('الحجز غير موجود');
        }

        // تحديث البيانات
        $sql = "UPDATE bookings 
                SET name = :name, 
                    phone = :phone, 
                    email = :email, 
                    yacht_name = :yacht_name, 
                    hours = :hours,
                    booking_date = :booking_date,
                    updated_at = NOW()
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':yacht_name' => $yacht_name,
            ':hours' => $hours,
            ':booking_date' => $booking_date
        ]);

        echo json_encode([
            'success' => true,
            'message' => 'تم تحديث الحجز بنجاح'
        ]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'طريقة الطلب غير مسموحة'
    ]);
}
