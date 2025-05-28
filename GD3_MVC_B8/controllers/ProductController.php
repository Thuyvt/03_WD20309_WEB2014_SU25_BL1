<?php
    class ProductController {
        // Khai báo class trong Model sẽ dùng
        public $productQuery;

        // Khai báo phương thức
        public function __construct() {
            $this->productQuery = new ProductQuery();
        }
        public function __destruct(){}

        //Hàm thực hiện chức năng list
        public function list() {
            // Gọi tới ProductQuery->all() để lấy danh sách product trong CSDL
            $danhSachProduct = $this->productQuery->all();
            // var_dump($danhSachProduct);
            // Hiển thị view tương ứng
            include "views/product/list.php";
        }

        public function create() {
            // Hiển thị view tương ứng
            include "views/product/create.php";
        }

        public function detail($id) {
            // Log giá trị id nhận được
            echo "ID muốn xem chi tiết là: $id <hr>";
            if ($id !== "") {
                // Hiển thị view
                include "views/product/detail.php";
            } else {
                echo "Lỗi: không nhận được thông tin, vui lòng thử lại <hr>";
            }
        }
        public function update($id) {
            // Log giá trị id nhận được
            echo "ID muốn sửa là: $id <hr>";
            if ($id !== "") {
                // Hiển thị view
                include "views/product/update.php";
            } else {
                echo "Lỗi: không nhận được thông tin, vui lòng thử lại <hr>";
            }
        }
        public function delete($id) {
            // Log giá trị id nhận được
            echo "ID muốn xóa là: $id <hr>";
            if ($id !== "") {
                // echo "Xóa $id <hr>";
                // Gọi hàm trong ProductQuery thực hiện xóa trong csdl
                $data = $this->productQuery->delete($id);
                if ($data == 1) {
                    // Quay lại trang danh sách
                    header("Location: ?act=product-list");
                } else {
                    echo "Xóa không thành công";
                }
            } else {
                echo "Lỗi: không nhận được thông tin, vui lòng thử lại <hr>";
            }
        }
    }
?>