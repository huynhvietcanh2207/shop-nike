<?php

class User
{
    public function register($name, $email, $password)
    {
        // Mã hóa mật khẩu để bảo mật
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Chèn dữ liệu người dùng vào cơ sở dữ liệu
        $sql = Model::$connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($sql === false) {
            return false;
        }

        $sql->bind_param("sss", $name, $email, $hashedPassword);

        if ($sql->execute()) {
            $sql->close(); // Đóng kết nối sau khi thực thi
            return true;
        } else {
            $sql->close(); // Đóng kết nối nếu thất bại
            return false;
        }
    }

    public function login($email, $password)
    {
        // Lấy dữ liệu người dùng từ cơ sở dữ liệu dựa trên email được cung cấp
        $sql = Model::$connection->prepare("SELECT id, password FROM users WHERE email = ?");
        if ($sql === false) {
            return false;
        }

        $sql->bind_param("s", $email);

        if ($sql->execute()) {
            $result = $sql->get_result();
            $user = $result->fetch_assoc();
            if ($user) {
                // Xác minh mật khẩu
                if (password_verify($password, $user['password'])) {
                    $sql->close(); // Đóng kết nối sau khi xác minh mật khẩu
                    return $user['id'];
                } else {
                    $sql->close(); // Đóng kết nối nếu mật khẩu không đúng
                    return false;
                }
            } else {
                $sql->close(); // Đóng kết nối nếu người dùng không tồn tại
                return false;
            }
        } else {
            $sql->close(); // Đóng kết nối nếu có lỗi thực thi câu lệnh
            return false;
        }
    }
}
