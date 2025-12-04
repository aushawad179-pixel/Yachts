<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        // استقبال معرف الحجز
        $id = intval($_POST['id'] ?? $_GET['id'] ?? 0);

        if ($id <= 0) {
            throw new Exception('معرف الحجز مطلوب');
        }

        // التحقق من وجود الحجز
        $check_sql = "SELECT id FROM bookings WHERE id = :id";
        $check_stmt = $pdo->prepare($check_sql);
        $check_stmt->execute([':id' => $id]);

        if (!$check_stmt->fetch()) {
            throw new Exception('الحجز غير موجود');
        }

        // حذف الحجز
        $sql = "DELETE FROM bookings WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        echo json_encode([
            'success' => true,
            'message' => 'تم حذف الحجز بنجاح'
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
