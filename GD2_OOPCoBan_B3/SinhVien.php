<?php 
    // 1. Khai báo class
    // Tên class viết dạng UpperCamelCase
    // Tên thuộc tính viết dạng lowerCamelCase\
    // Tên phương thức viết dạng lowerCamelCase
    class SinhVien {
        // 2. Khai báo thuộc tính
        // Access level: public -> default -> protected -> private
        public $hoVaTen;
        public $namSinh;
        public $maSinhVien;
        public $email;
        public $sdt;
        public $sdtPhuHuynh;
        public $truong;

        // 3. Khai báo phương thức
        // Phương thức mặc định luôn luôn phải có 
        public function __construct() {
            // Hàm khởi tạo, chạy sau khi khởi tạo đối tượng
            // Dùng để khai báo giá trị mặc định cần thiết
        }
        public function __destruct() {
            // Hàm dạy sau khi không sử dụng đối tượng
            // Dùng để xóa, reset biến, giải phóng bộ nhớ....
        }

        // Các phương thức khác
        public function gioiThieuBanThan() {
            // Cách lấy giá trị thuộc tính trong class
            // Cấu trúc lệnh $this->tenThuocTinh
            echo "Thông tin cá nhân: <br>";
            echo "Tên tôi là: " .$this->hoVaTen. "<br>";
            echo "Tôi sinh năm: " .$this->namSinh . "<br>";
            echo "Năm nay tôi: " .(2025 - $this->namSinh) . " tuổi <br>";
            //...
        }
    }
?>