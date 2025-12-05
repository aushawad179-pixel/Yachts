<?php
header('Content-Type: application/json');
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $yacht_name = $_POST['yacht_name'] ?? '';
    $hours = $_POST['hours'] ?? '';
    $booking_date = $_POST['booking_date'] ?? '';

    if (empty($name) || empty($phone) || empty($email) || empty($yacht_name) || empty($hours) || empty($booking_date)) {
        echo json_encode(['success' => false, 'message' => 'يرجى إدخال جميع البيانات']);
        exit;
    }

    try {
        // ✅ التحقق من الإيميل في جدول users
        $stmt = $pdo->prepare("SELECT id, name FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            echo json_encode([
                'success' => false,
                'message' => 'البريد الإلكتروني غير مسجل. يرجى إنشاء حساب أولاً'
            ]);
            exit;
        }

        // ✅ حفظ الحجز
        $stmt = $pdo->prepare("INSERT INTO bookings (name, phone, email, yacht_name, hours, booking_date) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, $phone, $email, $yacht_name, $hours, $booking_date])) {
            echo json_encode([
                'success' => true,
                'message' => 'تم الحجز بنجاح!'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'حدث خطأ أثناء الحجز']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'خطأ: ' . $e->getMessage()]);
    }
}
