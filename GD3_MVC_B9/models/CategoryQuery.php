<?php
    class CategoryQuery {

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

        public function all() {
            try {
                // 1. Khai báo câu sql
                $sql = 'SELECT * FROM category';

                // 2. Thực thi
                $data = $this->pdo->query($sql)->fetchAll();

                // 3. Convert data sang object
                $danhSachCategory = [];
                foreach($data as $value) {
                    $object = new Category();
                    $object->id = $value["id"];
                    $object->name = $value["name"];
                    $danhSachCategory[] = $object;
                }
                return $danhSachCategory;
            } catch(Exception $error) {
                
            }
        }

    }
?>