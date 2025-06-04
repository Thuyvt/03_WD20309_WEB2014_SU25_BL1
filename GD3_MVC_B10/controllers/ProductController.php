<?php
    class ProductController {
        // Khai báo class trong Model sẽ dùng
        public $productQuery;
        public $categoryQuery;

        // Khai báo phương thức
        public function __construct() {
            $this->productQuery = new ProductQuery();
            $this->categoryQuery = new CategoryQuery();
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
            // 1. Khởi tạo giá trị biến cần thiết
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";
            $product = new Product();
            $danhSachCategory = $this->categoryQuery->all();
            var_dump($danhSachCategory);

            // Kiểm tra người dùng submit form
            if(isset($_POST["submitForm"])){
                // 2. Gán giá trị từ $_POST cho object $product
                $product->name = trim($_POST["name"]);
                $product->price = trim($_POST["price"]);
                $product->category_id = trim($_POST["category_id"]);
                $product->quantity = trim($_POST["quantity"]);
                $product->image_src = trim($_POST["image_src"]);
                $product->created_date = trim($_POST["created_date"]);

                // 3. Validate form
                // Validate bắt buộc nhập
                if ($product->name === "" || $product->price === "" ||
                    $product->quantity === "") {
                    $thongBaoLoi = "Tên, Giá, Số lượng là thông tin bắt buộc nhập";
                }
                // Validate khác nếu đề bài yêu cầu;
                // ...
                // 4. Xử lý upload ảnh
                // Nội dung nâng cao, TODO sau ..

                // 5. Gọi model để insert giá trị vào CSDL
                // Kiểm tra trạng thái thông báo lỗi
                if ($thongBaoLoi === "") {
                    $data = $this->productQuery->insert($product);
                    if ($data == 1) {
                        //Reset giá trị biến $product
                        $product = new Product();
                        // Tạo thành công -> hiển thị thông báo
                        $thongBaoThanhCong = "Tạo mới thành công";
                    }else  {
                        $thongBaoLoi = "Tạo mới thất bạn. Mời thực hiện lại";
                    }
                }
            }  

            // Hiển thị view tương ứng
            include "views/product/create.php";
        }

        public function detail($id) {
            // Log giá trị id nhận được
            echo "ID muốn xem chi tiết là: $id <hr>";
            if ($id !== "") {
                $categoryQuery = $this->categoryQuery->all();
                // Lấy thông tin product từ model
                $product = $this->productQuery->find($id);
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
                // 1. Khởi tạo giá trị biến cần thiết
                $thongBaoLoi = "";
                $thongBaoThanhCong = "";
                // Tìm thông tin chi tiết bản ghi cần sửa
                $product = $this->productQuery->find($id);

                $danhSachCategory = $this->categoryQuery->all();
                // var_dump($danhSachCategory);

                // Kiểm tra người dùng submit form
                if(isset($_POST["submitForm"])){
                    // 2. Gán giá trị từ $_POST cho object $product
                    $product->name = trim($_POST["name"]);
                    $product->price = trim($_POST["price"]);
                    $product->category_id = trim($_POST["category_id"]);
                    $product->quantity = trim($_POST["quantity"]);
                    $product->image_src = trim($_POST["image_src"]);
                    $product->created_date = trim($_POST["created_date"]);

                    // 3. Validate form
                    // Validate bắt buộc nhập
                    if ($product->name === "" || $product->price === "" ||
                        $product->quantity === "") {
                        $thongBaoLoi = "Tên, Giá, Số lượng là thông tin bắt buộc nhập";
                    }
                    // Validate khác nếu đề bài yêu cầu;
                    // ...
                    // 4. Xử lý upload ảnh
                    // Nội dung nâng cao, TODO sau ..

                    // 5. Gọi model để insert giá trị vào CSDL
                    // Kiểm tra trạng thái thông báo lỗi
                    if ($thongBaoLoi === "") {
                        $data = $this->productQuery->update($product);
                        if ($data == 1) {
                            //Reset giá trị biến $product
                            $product = new Product();
                            // Tạo thành công -> hiển thị thông báo
                            $thongBaoThanhCong = "Cập nhật thành công";
                        } else if ($data == 0) {
                            $thongBaoLoi =  "Mời nhập thông tin cần sửa";
                        } else  {
                            $thongBaoLoi = "Cập nhật thất bạn. Mời thực hiện lại";
                        }
                    }
                }  

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