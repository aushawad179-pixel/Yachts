<?php
header('Content-Type: application/json');
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['register_name'] ?? '';
    $email = $_POST['register_email'] ?? '';
    $phone = $_POST['register_phone'] ?? '';
    $password = $_POST['register_password'] ?? '';
    $gender = $_POST['register_gender'] ?? '';
    $birthdate = $_POST['register_birthdate'] ?? '';

    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($gender) || empty($birthdate)) {
        echo json_encode(['success' => false, 'message' => 'يرجى إدخال جميع البيانات']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'البريد الإلكتروني مستخدم مسبقاً']);
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password, gender, birthday, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");

        if ($stmt->execute([$name, $email, $phone, $hashedPassword, $gender, $birthdate])) {
            echo json_encode(['success' => true, 'message' => 'تم إنشاء الحساب بنجاح']);
        } else {
            echo json_encode(['success' => false, 'message' => 'حدث خطأ أثناء إنشاء الحساب']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'خطأ في قاعدة البيانات: ' . $e->getMessage()]);
    }
}
