<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL;
$id = NULL;

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access. Please log in.");
}

// Tạo token CSRF nếu chưa có trong session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Tạo token ngẫu nhiên 32 byte
}

$id = $_GET['id'] ?? null;
$csrf_token = $_POST['csrf_token'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem token CSRF có hợp lệ không
    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        die("Invalid CSRF token.");
    }

    // Kiểm tra người dùng hiện tại có quyền xóa không (ở đây giả sử chỉ cho phép xóa chính mình)
    if (!empty($id) && $_SESSION['user_id'] == $id) {
        $userModel->deleteUserById($id); // Xóa user có ID khớp với người dùng hiện tại
        header('location: list_users.php');
        exit;
    } else {
        die("Unauthorized action. You can only delete your own account.");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <h2>Are you sure you want to delete this user?</h2>
    <form method="POST" action="delete_user.php?id=<?php echo $id; ?>">
        <!-- Thêm trường hidden chứa CSRF Token -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit">Confirm Delete</button>
    </form>
</body>
</html>
