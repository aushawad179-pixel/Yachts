<?php
header('Content-Type: application/json');
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['login_email'] ?? '';
    $password = $_POST['login_password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'يرجى إدخال جميع البيانات']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];

            echo json_encode(['success' => true, 'message' => 'تم تسجيل الدخول بنجاح']);
        } else {
            echo json_encode(['success' => false, 'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'خطأ في قاعدة البيانات']);
    }
}
