<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$errors = [];  // Mảng lưu trữ lỗi
$user = NULL;
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id);  // Tìm user theo id đã giải mã
}

// Hàm kiểm tra chuỗi ký tự hợp lệ (name)
function validateName($name) {
    return preg_match('/^[a-zA-Z0-9]{5,15}$/', $name);
}

// Hàm kiểm tra password hợp lệ
function validatePassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()]).{5,10}$/', $password);
}

if (!empty($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Kiểm tra thông tin "Name"
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    } elseif (!validateName($name)) {
        $errors['name'] = 'Name must be 5-15 characters long and contain only letters and numbers.';
    }

    // Kiểm tra thông tin "Password"
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (!validatePassword($password)) {
        $errors['password'] = 'Password must be 5-10 characters long, and include at least one lowercase letter, one uppercase letter, one digit, and one special character (~!@#$%^&*()).';
    }

    // Nếu không có lỗi, tiến hành thêm hoặc cập nhật user
    if (empty($errors)) {
        if (!empty($_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id; ?>">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name']; ?>">
                    <!-- Hiển thị lỗi Name -->
                    <?php if (!empty($errors['name'])) { ?>
                        <div class="text-danger"><?php echo $errors['name']; ?></div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <!-- Hiển thị lỗi Password -->
                    <?php if (!empty($errors['password'])) { ?>
                        <div class="text-danger"><?php echo $errors['password']; ?></div>
                    <?php } ?>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
<form method="POST" name="userForm" onsubmit="return validateForm()">
    <!-- Các phần khác giữ nguyên -->
</form>

</html>

<script>
function validateForm() {
    var name = document.forms["userForm"]["name"].value;
    var password = document.forms["userForm"]["password"].value;
    var nameRegex = /^[a-zA-Z0-9]{5,15}$/;
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()]).{5,10}$/;

    if (!name.match(nameRegex)) {
        alert("Name must be 5-15 characters long and contain only letters and numbers.");
        return false;
    }

    if (!password.match(passwordRegex)) {
        alert("Password must be 5-10 characters long, and include at least one lowercase letter, one uppercase letter, one digit, and one special character (~!@#$%^&*()).");
        return false;
    }

    return true;
}
</script>
