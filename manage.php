<?php
session_start();
// Kiểm tra nếu người dùng đã đăng nhập và có quyền admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "Bạn không có quyền truy cập trang này!";
    exit;
}

$servername = "localhost";
$username = "root"; // Thay thế bằng username của bạn
$password = "npph2512"; // Thay thế bằng password của bạn
$database = "QL_NhanSu";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hàm hiển thị danh sách nhân viên
function showEmployees($conn) {
    $sql = "SELECT NHANVIEN.Ma_NV, NHANVIEN.Ten_NV, NHANVIEN.Phai, NHANVIEN.Noi_Sinh, PHONGBAN.Ten_Phong, NHANVIEN.Luong FROM NHANVIEN JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' class='table'><tr><th>Mã Nhân Viên</th><th>Tên Nhân Viên</th><th>Giới Tính</th><th>Nơi Sinh</th><th>Tên Phòng</th><th>Lương</th><th>Hành động</th></tr>";
        while($row = $result->fetch_assoc()) {
            $genderImage = $row["Phai"] == "NU" ? "man.jpg" : "woman.jpg";
            $genderAlt = $row["Phai"] == "NU" ? "Nữ" : "Nam";
            echo "<tr>
                    <td>" . $row["Ma_NV"]. "</td>
                    <td>" . $row["Ten_NV"]. "</td>
                    <td><img src='images/" . $genderImage . "' alt='" . $genderAlt . "' style='width:30px; height:auto;'></td>
                    <td>" . $row["Noi_Sinh"]. "</td>
                    <td>" . $row["Ten_Phong"]. "</td>
                    <td>" . $row["Luong"]. "</td>
                    <td><a href='edit.php?Ma_NV=".$row["Ma_NV"]."'>Sửa</a> | <a href='delete.php?Ma_NV=".$row["Ma_NV"]."'>Xóa</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Nhân Viên</title>
</head>
<body>
    <h2>Danh Sách Nhân Viên</h2>
    <button type="button" id="showAddForm">Thêm Nhân viên</button>
    <?php showEmployees($conn); ?>

    <h3>Thêm Nhân Viên Mới</h3>
    <form id="addEmployeeForm" action="add.php" method="post" style="display:none;">
        Mã Nhân Viên: <input type="text" name="Ma_NV"><br>
        Tên Nhân Viên: <input type="text" name="Ten_NV"><br>
        Giới Tính: <input type="text" name="Phai"><br>
        Nơi Sinh: <input type="text" name="Noi_Sinh"><br>
        Mã Phòng: <input type="text" name="Ma_Phong"><br>
        Lương: <input type="text" name="Luong"><br>
        <button type="submit">Thêm</button>
    </form>
    <script>
    document.getElementById('showAddForm').onclick = function() {
        document.getElementById('addEmployeeForm').style.display = 'block';
    };
</script>
</body>
</html>
