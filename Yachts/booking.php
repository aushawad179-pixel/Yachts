<?php
header('Content-Type: application/json');
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $yacht = $_POST['yacht_name'] ?? '';
    $hours = $_POST['hours'] ?? '';
    $booking_date = $_POST['booking_date'] ?? '';

    if (empty($name) || empty($phone) || empty($email) || empty($yacht) || empty($hours) || empty($booking_date)) {
        echo json_encode(['success' => false, 'message' => 'يرجى إدخال جميع البيانات']);
        exit;
    }

    // التحقق من أن المستخدم مسجل
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? AND phone = ?");
    $stmt->execute([$email, $phone]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'يجب أن تكون مسجلاً قبل الحجز']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, yacht_name, hours, booking_date, created_at) VALUES (?, ?, ?, ?, NOW())");
        if ($stmt->execute([$user['id'], $yacht, $hours, $booking_date])) {
            echo json_encode(['success' => true, 'message' => 'تم الحجز بنجاح']);
        } else {
            echo json_encode(['success' => false, 'message' => 'حدث خطأ أثناء الحجز']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'خطأ في قاعدة البيانات: ' . $e->getMessage()]);
    }
}
