<?php
    // Khu vực xử lý logic
    // 1. Khai báo mảng 2 chiều
    $danhSachSinhVien = array(
        array("ten" => "Nguyễn Văn A", "tuoi" => 18, "diaChi" => "Hà Nội"),
        array("ten" => "Nguyễn Thị B", "tuoi" => 20, "diaChi" => "Hà Nội"),
        array("ten" => "Nguyễn Văn C", "tuoi" => 21, "diaChi" => "Hà Nam"),
        array("ten" => "Trần Văn D", "tuoi" => 22, "diaChi" => "Nam Định"),
        array("ten" => "Vũ Thị E", "tuoi" => 18, "diaChi" => "Hải Phòng"),
    );
    echo "log thử tất cả giá trị người dùng nhập vào";
    var_dump($_GET);
    echo "<br><br>";
    // 2. Logic tìm kiếm tuyệt đối
    if (isset($_GET["tuyetDoi"])) {
        echo "Submit form tuyệt đối. Bắt đầu xử lý logic <br>";

        // Lấy dữ liệu nhập vào form và lưu vào biến
        $tenTimKiem = trim($_GET["tenTimKiem"]);

        // Kiểm tra giá trị biến nhập vào
        if($tenTimKiem !== "") {
            // duyệt mảng chính kiểm tra phần tử không thỏa mãn xóa khỏi mảng
            foreach($danhSachSinhVien as $key => $value) {
                if ($value["ten"] !==  $tenTimKiem) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
    }

    // 3. Logic tìm kiếm tương đối
    if (isset($_GET["tuongDoi"])) {
        echo "Submit form tương đối. Bắt đầu xử lý logic <br>";
        $tenTimKiem = trim($_GET["tenTimKiem"]);
        $diaChiTimKiem = trim($_GET["diaChiTimKiem"]);
        
        // kiểm tra giá trị biến nhập vào
        if ($tenTimKiem !== "") {
            foreach($danhSachSinhVien as $key =>$value) {
                $viTri = strpos(strtolower($value["ten"]), strtolower($tenTimKiem));
                // strpos trả về false là ko tìm thấy, trả về số >= 0 là tìm thấy
                // strtolower chuyển chuỗi về viết thường
                if ($viTri === false) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
        if ($diaChiTimKiem !== "") {
            // duyệt mảng kiểm tra phần tử không thỏa mãn địa chỉ, xóa khỏi mảng
            foreach($danhSachSinhVien as $key=>$value) {
                $viTri = strpos(strtoupper($value["diaChi"]), strtoupper($diaChiTimKiem));
                if ($viTri === false) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
    }
?>
<!-- Khu vực hiển thị html -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <style>
    th, td {
        padding: 8px 10px;
    }
 </style>
 <body>
        <!-- Khu vực form tìm kiếm tuyệt đối -->
        <h3>1. Form tìm kiếm tuyệt đối</h3>
        <p>Logic:</p>
        <ul>
            <li>Nhập đầy đủ tên sinh viên để tìm kiếm</li>
            <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
        </ul>
        <form action="" method="GET">
            <span>Nhập tên:</span>
            <input type="text" name="tenTimKiem">
            <button type="submit" name="tuyetDoi">Tìm kiếm</button>
        </form>

        <!-- Khu vực form tìm kiếm tương đối -->
        <h3>2. Form tìm kiếm tương đối</h3>
        <p>Logic:</p>
        <ul>
            <li>Hỗ hỗ nhập 1 vài ký tự và tìm kiếm</li>
            <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
            <li>Hỗ trợ tìm kiếm không phân biệt hoa thường</li>
            <li>Hỗ trợ hiển thị lại giá trị đã nhập trước đó</li>
            <li>Hỗ trợ tìm kiếm kết hợp tên và địa chỉ</li>
            <li>Hỗ trợ button tải lại</li>
        </ul>
        <form action="" method="GET">
            <span>Nhập tên:</span>
            <?php 
                if (!isset($_GET["tuongDoi"])) {
                    echo '<input type="text" name="tenTimKiem">';
                } else {
                    echo ' <input type="text" name="tenTimKiem" value="'.$tenTimKiem. '">';
                }
            ?>

            <span>Nhập địa chỉ:</span>
            <?php 
                if (!isset($_GET["tuongDoi"])) {
                    echo '            <input type="text" name="diaChiTimKiem">';
                } else {
                    echo ' <input type="text" name="diaChiTimKiem" value="'.$diaChiTimKiem. '">';
                }
            ?>
            <!-- <input type="text" name="diaChiTimKiem"> -->

            <button type="submit" name="tuongDoi">Tìm kiếm</button>
        </form>

        <!-- Hiển thị danh sách -->
        <h3>Danh sách sinh viên</h3>
        <table border="1">
            <!-- Khu vực tiêu đề bảng -->
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tuổi</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <!-- Khu vực dữ liệu -->
            <tbody>
                <?php 
                    if (count($danhSachSinhVien) > 0) {
                        foreach ($danhSachSinhVien as $sv) {
                            echo " <tr>";
                            echo "     <td>".$sv["ten"]."</td>";
                            echo "     <td>".$sv["tuoi"]."</td>";
                            echo "     <td>".$sv["diaChi"]."</td>";
                            echo " </tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='3'> Không có dữ liệu</td>";
                        echo "</tr>";
                    }
                ?>
                <!-- <tr>
                    <td>A</td>
                    <td>20</td>
                    <td>Hn</td>
                </tr> -->
             
            </tbody>
        </table>
 </body>
 </html>