<?php
    class ProductQuery {
        
        // Khai báo thuộc tính
        public $pdo;

        // Khai báo phương thức
        public function __construct() {
            try {   
                $this->pdo = new PDO("mysql:host=localhost; port=3306; dbname=03_wd20309_web2014_su25_bl1",
                 "root", "");
                echo "// Kết nối CSDL thành công <hr>";
            } catch (Exception $error) {
                echo "//Lỗi: " . $error-> getMessage();
                echo "<br>";
            }
        }
        public function __destruct() {
            // đóng kết nối với csdl
            $this->pdo = null;
        }

        // Hàm lấy danh sách
        public function all() {
            try {
                // 1. Khai báo câu lện 
                $sql = "SELECT * FROM product";

                // 2. Thực hiện truy vấn và lấy giá trị trả 
                $data = $this->pdo->query($sql)->fetchAll();
                // var_dump($data);

                // 3. Convert data sang object Product
                $danhSachSP = [];
                foreach ($data as $value) {
                    $product = new Product();
                    $product->id = $value["id"];
                    $product->name = $value["name"];
                    $product->price  = $value["price"];
                    $product->quantity = $value["quantity"];
                    $product->category_id = $value["category_id"];
                    $product->image_src = $value["image_src"];
                    $product->created_date = $value["created_date"];
                    // thêm object danhsachSP
                    $danhSachSP[] = $product;
                }
                return $danhSachSP;
                
            } catch(Exception $error) {
                echo "Lỗi" .$error->getMessage() . "<br>";
            }
        }
    }
?>