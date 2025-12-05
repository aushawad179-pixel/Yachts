<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

try {
    // الحصول على معامل id إذا كان موجوداً
    $id = $_GET['id'] ?? null;

    if ($id) {
        // عرض حجز واحد
        $sql = "SELECT * FROM bookings WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $booking = $stmt->fetch();

        if ($booking) {
            echo json_encode([
                'success' => true,
                'data' => $booking
            ]);
        } else {
            http_response_code(404);
            echo json_encode([
                'success' => false,
                'message' => 'الحجز غير موجود'
            ]);
        }
    } else {
        // عرض جميع الحجوزات
        $sql = "SELECT * FROM bookings ORDER BY created_at DESC";
        $stmt = $pdo->query($sql);
        $bookings = $stmt->fetchAll();

        echo json_encode([
            'success' => true,
            'data' => $bookings,
            'count' => count($bookings)
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'خطأ في جلب البيانات: ' . $e->getMessage()
    ]);
}
