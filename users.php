<?php
// users.php
include 'db.php'; // ملف الاتصال بقاعدة البيانات

class Users
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // إضافة مستخدم جديد (Register)
    public function addUser($name, $email, $password)
    {
        // تشفير كلمة المرور
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // تحقق إذا البريد موجود مسبقًا
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'البريد الإلكتروني مستخدم مسبقًا'];
        }

        // إدخال المستخدم الجديد
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $hashedPassword])) {
            return ['success' => true, 'message' => 'تم إضافة المستخدم بنجاح'];
        } else {
            return ['success' => false, 'message' => 'حدث خطأ أثناء إضافة المستخدم'];
        }
    }

    // الحصول على كل المستخدمين
    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT id, name, email, created_at FROM users ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // الحصول على مستخدم حسب ID
    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT id, name, email, created_at FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // تعديل بيانات مستخدم
    public function updateUser($id, $name, $email)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    // حذف مستخدم
    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
