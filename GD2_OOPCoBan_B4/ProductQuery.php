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
    }
?>